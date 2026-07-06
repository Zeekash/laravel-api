<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/chatbox.css') }}">
   

</head>


<body>




    <div class="hubspot_chatbox">
        <div class="hubspot_chatbox__header">
            <div class="hubspot_chatbox__header__title">
                <img class="ms-1 profile_pic" src={{ asset('assets/img/mmj-favicon.png') }} width="40px"
                    alt="profile" />
                <div class="ms-2">
                    <span>My Moving Journey</span>
                    <p class="mb-0 text-white" style="font-size: 12px;">we reply in few minutes...</p>
                </div>
            </div>
            <div class="hubspot_chatbox__header__close">
                <i class="fas fa-trash me-2" style="cursor: pointer"></i>
                <i class="fas fa-times"></i>
            </div>
        </div>

        <div class="hubspot_chatbox__body">
            <div class="show_welcome_head">
                <h2></h2>
            </div>
            <div class="hubspot_chatbox__options">

                <button class="option-button" data-question="What is MYMovingJourney?">
                    What is MYMovingJourney?
                </button>
                <button class="option-button" data-question="I want to move?">
                    I want to move?
                </button>
                <button class="option-button" data-question="What is the process for moving in the USA?">
                    What is the process for moving in the USA?
                </button>
            </div>
        </div>

        <div class="hubspot_chatbox__footer">
            <div class="input_wrapper">
                <input type="text" placeholder="Type a message..." />
                <button><img src={{ asset('assets/img/sent.png') }} width="25px"></button>
            </div>
            <div class="powered_by">
                <p class="mb-0">Powered by <a href="https://www.movergpt.com/" style="text-decoration:underline;text-decoration-color: #038E9E;"
                        target="_blank"><strong>MoverGPT</strong></a> <img src={{ asset('assets/img/movergpt.png') }}
                        width="30px" alt="logo"></p>
            </div>
        </div>


    </div>

    <div class="chatbox_btn">
        <i class="fas fa-message"></i>
    </div>

    <script>
        // Function to show or hide the sent time when a message is clicked.
        function showSentTime(event) {
            const msgElem = event.currentTarget;
            const sentTime = msgElem.getAttribute("data-sent-time");
            let timeSpan = msgElem.querySelector(".sent-time");

            if (timeSpan) {
                timeSpan.remove();
            } else {
                timeSpan = document.createElement("div");
                timeSpan.classList.add("sent-time");
                timeSpan.style.fontSize = "10px";
                timeSpan.style.color = "gray";
                timeSpan.style.marginTop = "1px";

                const messageType = msgElem.getAttribute("data-message-type");
                let label = messageType === "sent" ? "Sent" : "Received";
                timeSpan.textContent = label + " at " + sentTime;

                if (messageType === "sent") {
                    timeSpan.style.marginLeft = "auto";
                }

                msgElem.appendChild(timeSpan);
            }
        }
        // Base URL for your chatbot API (ensure protocol and domain match your deployment)
        const apiBase = "https://mmj.movergpt.com/api";
        let chatId = null;
        let botName = null;
        let lastHistoryCount = 0;
        let pollingInterval = null;
        const defaultBotNames = ["Alice", "Bob", "Charlie", "David", "Emma", "Fiona", "George", "Hannah", "Ivan", "Julia"];
        const displayedMessages = new Set();
        // Array to track user messages that have been appended optimistically.
        let optimisticMessages = [];
        // New set to track messages currently being rendered by the typewriter effect.
        let inProgressMessages = new Set();

        // Helper: Remove one occurrence of a user message (after trimming) from optimisticMessages.
        function removeOptimisticMessage(message) {
            message = message.trim();
            const index = optimisticMessages.findIndex(m => m.trim() === message);
            if (index > -1) {
                optimisticMessages.splice(index, 1);
                return true;
            }
            return false;
        }
        // Template for options HTML (for quick query buttons)
        const optionsHTML = `
      <div class="hubspot_chatbox__options">
        <p class="mb-0 common_question">Common questions are:</p>
        <button class="option-button" data-question="What is MYMovingJourney?">
          What is MYMovingJourney?
        </button>
        <button class="option-button" data-question="I want to move?">
          I want to move?
        </button>
        <button class="option-button" data-question="What is the process for moving in the USA?">
          What is the process for moving in the USA?
        </button>
      </div>
    `;

        // Function to return welcome message HTML.
        function showWelcomeMessage(message) {
            return `<div class="show_welcome_head"><h2>${message}</h2></div>`;
        }

        // Remove the options panel (welcome heading remains).
        function removeWelcomeAndOptions() {
            const optionsElem = document.querySelector(".hubspot_chatbox__options");
            if (optionsElem) optionsElem.remove();
        }

        // Attach event listeners to option buttons.
        function attachOptionEvents() {
            const optionButtons = document.querySelectorAll(".hubspot_chatbox__options .option-button");
            optionButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const question = button.getAttribute("data-question");
                    appendMessage("user", question);
                    optimisticMessages.push(question);
                    sendMessage(question);
                    removeWelcomeAndOptions();
                });
            });
        }

        // Trash icon event: clear messages, end session, and restart session.
        const clean = document.querySelector(".fa-trash");
        if (clean) {
            clean.addEventListener('click', async () => {
                const chatBody = document.querySelector(".hubspot_chatbox__body");
                if (chatBody) chatBody.innerHTML = "";
                displayedMessages.clear();
                optimisticMessages = [];
                await endChat();
                initializeChat();
            });
        }

        // Utility to truncate text.
        function truncateWords(text, maxWords = 80) {
            const words = text.split(/\s+/);
            return words.length > maxWords ? words.slice(0, maxWords).join(" ") + "..." : text;
        }

        // Append a message instantly.
        function appendMessage(sender, message, force = false) {
            if (sender !== "user") {
                if (!force) {
                    const key = sender + ":" + message;
                    if (displayedMessages.has(key)) return;
                    displayedMessages.add(key);
                }
            }
            if (sender === "assistant" && botName) sender = botName;
            let container = document.getElementById("chat-messages") || document.querySelector(".hubspot_chatbox__body");
            if (container) {
                const msgElem = document.createElement("div");
                msgElem.classList.add("message", "hubspot_chatbox__body__message");
                const now = new Date();
                msgElem.setAttribute("data-sent-time", now.toLocaleTimeString());
                // Set the message type based on the sender.
                const messageType = (sender.toLowerCase() === "user") ? "sent" : "received";
                msgElem.setAttribute("data-message-type", messageType);
                msgElem.addEventListener("click", showSentTime);
                if (sender === "error") msgElem.classList.add("error");
                msgElem.innerHTML = `<div class="hubspot_chatbox__body__message__content">${truncateWords(message)}</div>`;
                container.appendChild(msgElem);
                container.scrollTop = container.scrollHeight;
            }
        }


        // Typewriter effect for assistant's reply.
        function typeWriterEffect(text, sender, callback) {
            let index = 0;
            let container = document.getElementById("chat-messages") || document.querySelector(".hubspot_chatbox__body");
            const msgElem = document.createElement("div");
            msgElem.classList.add("message", "hubspot_chatbox__body__message");
            const now = new Date();
            msgElem.setAttribute("data-sent-time", now.toLocaleTimeString());
            // Set the message type attribute.
            const messageType = (sender.toLowerCase() === "user") ? "sent" : "received";
            msgElem.setAttribute("data-message-type", messageType);
            msgElem.addEventListener("click", showSentTime);
            const contentDiv = document.createElement("div");
            contentDiv.classList.add("hubspot_chatbox__body__message__content");
            msgElem.appendChild(contentDiv);
            container.appendChild(msgElem);
            container.scrollTop = container.scrollHeight;

            if (sender === "assistant" && botName) sender = botName;
            const key = sender + ":" + text;
            if (displayedMessages.has(key) || inProgressMessages.has(key)) {
                if (callback) callback();
                return;
            }
            inProgressMessages.add(key);
            let interval = setInterval(() => {
                contentDiv.textContent += text[index];
                index++;
                container.scrollTop = container.scrollHeight;
                if (index >= text.length) {
                    clearInterval(interval);
                    inProgressMessages.delete(key);
                    displayedMessages.add(key);
                    if (callback) callback();
                }
            }, 30);
        }


        // Initialize chat session.
        async function initializeChat() {
            try {
                const response = await fetch(apiBase + "/start_chat", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    }
                });
                if (!response.ok) throw new Error(`Server Error (${response.status})`);
                const data = await response.json();
                chatId = data.chat_id;
                localStorage.setItem("chat_id", chatId);
                localStorage.setItem("welcome_message", data.message);
                const match = data.message.match(/I'm (\w+)/);
                if (match) {
                    botName = match[1];
                } else {
                    botName = defaultBotNames[Math.floor(Math.random() * defaultBotNames.length)];
                }
                localStorage.setItem("bot_name", botName);
                const chatBody = document.querySelector(".hubspot_chatbox__body");
                if (chatBody) {
                    chatBody.innerHTML = showWelcomeMessage(data.message) + optionsHTML;
                }
                attachOptionEvents();
                lastHistoryCount = 1;
            } catch (error) {
                console.error("Failed to initialize chat:", error);
                appendMessage("error", "Could not start chat session.");
            }
        }

        // Load full chat history instantly.
        async function loadChatHistory() {
            try {
                const response = await fetch(apiBase + "/get_chat_history?chat_id=" + chatId, {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json"
                    }
                });
                if (!response.ok) throw new Error(`Server Error (${response.status})`);
                const data = await response.json();
                if (data.history && Array.isArray(data.history)) {
                    const storedWelcome = localStorage.getItem("welcome_message");
                    let startIndex = 0;
                    if (
                        storedWelcome &&
                        data.history.length > 0 &&
                        data.history[0].sender === "assistant" &&
                        data.history[0].message === storedWelcome
                    ) {
                        startIndex = 1;
                    }
                    for (let i = startIndex; i < data.history.length; i++) {
                        const msg = data.history[i];
                        if (msg.sender === "user") {
                            if (removeOptimisticMessage(msg.message)) continue;
                            else appendMessage(msg.sender, msg.message);
                        } else if (msg.sender === "assistant" && botName) {
                            appendMessage(botName, msg.message);
                        } else {
                            appendMessage(msg.sender, msg.message);
                        }
                    }
                    lastHistoryCount = data.history.length;
                    if (data.history.length <= 1) {
                        const chatBody = document.querySelector(".hubspot_chatbox__body");
                        if (chatBody && !chatBody.querySelector(".hubspot_chatbox__options")) {
                            chatBody.insertAdjacentHTML("beforeend", optionsHTML);
                            attachOptionEvents();
                        }
                    }
                }
            } catch (error) {
                console.error("Error loading chat history:", error);
            }
        }

        // Update chat history for new messages.
        async function updateChatHistory() {
            if (!chatId) return;
            try {
                const response = await fetch(apiBase + "/get_chat_history?chat_id=" + chatId, {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json"
                    }
                });
                if (!response.ok) throw new Error(`Server Error (${response.status})`);
                const data = await response.json();
                if (data.history && Array.isArray(data.history)) {
                    if (data.history.length > lastHistoryCount) {
                        for (let i = lastHistoryCount; i < data.history.length; i++) {
                            const msg = data.history[i];
                            if (msg.sender === "user") {
                                if (removeOptimisticMessage(msg.message)) continue;
                                else appendMessage(msg.sender, msg.message);
                            } else if (msg.sender === "assistant" && botName) {
                                const key = botName + ":" + msg.message;
                                if (!displayedMessages.has(key) && !inProgressMessages.has(key)) {
                                    typeWriterEffect(msg.message, botName);
                                }
                            } else {
                                appendMessage(msg.sender, msg.message);
                            }
                        }
                        lastHistoryCount = data.history.length;
                    }
                }
            } catch (error) {
                console.error("Error updating chat history:", error);
            }
        }

        // Start polling.
        function startPolling() {
            pollingInterval = setInterval(updateChatHistory, 3000);
        }

        // Stop polling.
        function stopPolling() {
            if (pollingInterval) {
                clearInterval(pollingInterval);
                pollingInterval = null;
            }
        }

        // Send message via /general_query.
        async function sendMessage(message) {
            try {
                const response = await fetch(apiBase + "/general_query", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        chat_id: chatId,
                        message: message
                    })
                });
                if (!response.ok) throw new Error(`Server Error (${response.status})`);
                const data = await response.json();
                const key = botName + ":" + data.reply;
                if (!displayedMessages.has(key) && !inProgressMessages.has(key)) {
                    typeWriterEffect(data.reply, botName);
                }
            } catch (error) {
                console.error("Error sending message:", error);
                appendMessage("error", "Error processing your request.");
            }
        }

        // End chat session.
        async function endChat() {
            try {
                const response = await fetch(apiBase + "/end_chat", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        chat_id: chatId
                    })
                });
                if (!response.ok) throw new Error(`Server Error (${response.status})`);
                const data = await response.json();
                appendMessage(botName, data.ended_message || "Chat ended successfully.", true);
                localStorage.removeItem("chat_id");
                localStorage.removeItem("bot_name");
                localStorage.removeItem("welcome_message");
                chatId = null;
                displayedMessages.clear();
                const messagesContainer = document.getElementById("chat-messages") ||
                    document.querySelector(".hubspot_chatbox__body");
                if (messagesContainer) messagesContainer.innerHTML = "";
                stopPolling();
            } catch (error) {
                console.error("Error ending chat:", error);
                appendMessage("error", "Error ending the chat session.");
            }
        }

        // Handle sending message from input field.
        function handleSendMessage() {
            const inputElem = document.getElementById("chat-input") ||
                document.querySelector(".hubspot_chatbox__footer input");
            if (!inputElem) return;
            const message = inputElem.value.trim();
            if (message === "") return;
            removeWelcomeAndOptions();
            appendMessage("user", message);
            optimisticMessages.push(message);
            inputElem.value = "";
            sendMessage(message);
        }

        // Toggle element visibility.
        function toggleElement(el) {
            if (el.style.display === "none" || getComputedStyle(el).display === "none") {
                el.style.display = "block";
            } else {
                el.style.display = "none";
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const preOptions = document.querySelector(".hubspot_chatbox__options");
            if (preOptions) preOptions.remove();

            const storedChatId = localStorage.getItem("chat_id");
            const storedBotName = localStorage.getItem("bot_name");
            const storedWelcomeMessage = localStorage.getItem("welcome_message");
            const chatBody = document.querySelector(".hubspot_chatbox__body");

            if (storedChatId && chatBody) {
                chatId = storedChatId;
                botName = storedBotName ? storedBotName : defaultBotNames[Math.floor(Math.random() * defaultBotNames
                    .length)];
                chatBody.innerHTML = showWelcomeMessage(storedWelcomeMessage);
                loadChatHistory();
            } else {
                initializeChat();
            }
            startPolling();

            const sendBtn = document.getElementById("send-btn") ||
                document.querySelector(".hubspot_chatbox__footer button");
            if (sendBtn) {
                sendBtn.addEventListener("click", handleSendMessage);
            }
            const inputField = document.getElementById("chat-input") ||
                document.querySelector(".hubspot_chatbox__footer input");
            if (inputField) {
                inputField.addEventListener("keypress", function(e) {
                    if (e.key === "Enter") {
                        handleSendMessage();
                        e.preventDefault();
                    }
                });
            }
            const endBtn = document.getElementById("end-btn");
            if (endBtn) {
                endBtn.addEventListener("click", endChat);
            }
            const chatboxBtn = document.querySelector(".chatbox_btn");
            if (chatboxBtn) {
                chatboxBtn.addEventListener("click", function() {
                    const chatbox = document.querySelector(".hubspot_chatbox");
                    const commentIcon = document.querySelector(".fa-message");
                    if (chatbox) toggleElement(chatbox);
                    if (commentIcon) {
                        commentIcon.classList.toggle("fa-times");
                        commentIcon.classList.add("fa");
                        commentIcon.classList.remove("fa-regular");
                    }
                });
            }
            const closeElements = document.querySelectorAll(".fa-times");
            closeElements.forEach(function(el) {
                el.addEventListener("click", function() {
                    const chatbox = document.querySelector(".hubspot_chatbox");
                    if (chatbox) chatbox.style.display = "none";
                    const commentIcon = document.querySelector(".fa-message");
                    if (commentIcon) {
                        commentIcon.classList.remove("fa-times");
                        commentIcon.classList.add("fa-regular");
                        commentIcon.classList.remove("fas");
                    }
                });
            });
            const yourChatsHeaderClose = document.querySelector(".your_chats__header__close");
            if (yourChatsHeaderClose) {
                yourChatsHeaderClose.addEventListener("click", function() {
                    const chatsLayout = document.querySelector(".your_chats_layout");
                    if (chatsLayout) chatsLayout.style.display = "none";
                });
            }
            const addChatBtn = document.querySelector(".add_chat_btn");
            if (addChatBtn) {
                addChatBtn.addEventListener("click", function() {
                    const chatsLayout = document.querySelector(".your_chats_layout");
                    if (chatsLayout) toggleElement(chatsLayout);
                });
            }
            const arrowLeft = document.querySelector(".fa-arrow-left");
            if (arrowLeft) {
                arrowLeft.addEventListener("click", function() {
                    const chatsLayout = document.querySelector(".your_chats_layout");
                    if (chatsLayout) chatsLayout.style.display = "block";
                });
            }
            const yourChatsChat = document.querySelector(".your_chats__body__chat");
            if (yourChatsChat) {
                yourChatsChat.addEventListener("click", function() {
                    const chatsLayout = document.querySelector(".your_chats_layout");
                    if (chatsLayout) chatsLayout.style.display = "none";
                });
            }
            attachOptionEvents();
        });
    </script>




</body>

</html>
