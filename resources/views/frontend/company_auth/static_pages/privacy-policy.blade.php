@extends('layouts.app')

@section('title')
    Privacy Policy - My Moving Journey
@endsection

@section('meta_description')
    Read the Privacy Policy of My Moving Journey to understand how we collect, use, and protect your personal information

    while using our services.
@endsection
@section('meta_keywords', 'Privacy Policy')
<style>
    .about-section p {
        font-size: 18px;
        line-height: 30px
    }

    .about-section h1 {
        font-size: 48px;
    }

    .about-section h2 {
        font-size: 36px;
    }

    .about-section ul {
        padding-left: 30px;
    }

    .about-section ul li {
        font-size: 18px !important;
        font-family: var(--para-family), sans-serif !important;
        line-height: 30px
    }

    @media (max-width: 768px) {
        .about-section h1 {
            font-size: 42px !important;
            margin-top: 60px !important;
        }

        .about-section p {
            font-size: 16px !important;
            line-height: 30px !important
        }

        .about-section p a {
            color: #116087;
            text-underline-offset: 6px;
            font-weight: 700;
            text-decoration: underline;
            text-decoration-color: #116087;
        }

        .about-section h2 {
            font-size: 32px !important;
        }

        .about-section h3 {
            font-size: 24px !important;
        }

        .about-section ul li {
            font-size: 16px !important;
            font-family: var(--para-family), sans-serif !important;
            line-height: 30px !important
        }
    }
</style>
@section('content')
    <section class="bg-of-aqua-shade  py-md-5 py-2">

        <div class="mask d-flex align-items-center  gradient-custom-3 w-100">
            <div class="container ">
                <div class="row d-flex justify-content-center align-items-center ">
                    <div id="company-dashboard-main" class="card row py-0 px-0">
                        <div class="row p-0 m-auto bg-of-aqua-shade">
                            <div class="col-md-9 col-12 m-auto  dash-col2  bg-of-aqua-shade border-0">
                                <nav style="--bs-breadcrumb-divider: '➜';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                                    </ol>
                                </nav>
                                <section class="section about-section gray-bg" id="about-dash">
                                    <div class="container p-0">
                                        <div class="row">
                                            <h1 class="my-2 fw-bold">Privacy policy</h1>
                                            <p>At My Moving Journey, operated by Repo Studio Limited
                                                (referred to as "we," "our," "us"), your privacy is of paramount importance.
                                                This Privacy Policy explains how we collect, use, protect, and disclose your
                                                personal information when you visit our website, www.mymovingjourney.com
                                                ("Website"). You consent to the practices described in this Privacy Policy
                                                by accessing and using our Website.</p>
                                            <p>We are committed to safeguarding your personal information.
                                                This policy outlines the types of data we collect, how we use it, the steps
                                                we take to protect it, and the rights you have regarding your data.</p>
                                            <h2 class="mt-4">1. Information We Collect</h2>
                                            <p>We collect various information to improve your experience and
                                                ensure that our services are tailored to your needs. The information we
                                                collect can be broadly categorized into two types: personal information and
                                                non-personal information.</p>
                                            <h3 class="mt-4">Personal Information</h3>
                                            <p>Personal information refers to data that can be used to
                                                identify you. This may include:</p>
                                            <ul>
                                                <li><Strong>Name:</Strong> We collect your full name when you create an
                                                    account, request a
                                                    quote, or contact us for services.</li>
                                                <li><Strong>Email Address:</Strong> Your email address allows us to
                                                    communicate with you
                                                    regarding quotes, bookings, or service inquiries. If you consent to
                                                    receive promotional material, it is also used for marketing purposes.
                                                </li>
                                                <li><Strong>Phone Number:</Strong> We collect your phone number when you
                                                    provide it, such as
                                                    when making an inquiry or receiving a moving quote, to communicate with
                                                    you regarding your move or related services.</li>
                                                <li><Strong>Address:</Strong> Your current location or moving address is
                                                    essential for us to
                                                    provide you with accurate quotes and for logistics purposes.</li>
                                                <li><Strong>Payment Information:</Strong> If you pay for services, we
                                                    collect payment
                                                    information, such as credit card details or other financial data,
                                                    processed securely through a trusted payment gateway.</li>
                                                <li><Strong>Demographic Information:</Strong> We may collect additional
                                                    information, such as
                                                    your age or gender, though this is typically optional and used for
                                                    demographic analysis.</li>
                                            </ul>
                                            <h3 class="mt-4">Non-Personal Information</h3>
                                            <p>Non-personal data refers to information that cannot be used on
                                                its own to identify an individual. Examples include:</p>
                                            <ul>
                                                <li><strong>Device Information:</strong> We gather technical details about
                                                    the device used to
                                                    access our Website, such as the type of device, operating system, and
                                                    browser.</li>
                                                <li><strong>IP Address:</strong> The IP address from which you access our
                                                    Website is logged
                                                    for security and operational purposes. It helps us manage website
                                                    traffic and detect potential security threats.</li>
                                                <li><strong>Cookies and Tracking Technologies:</strong> We use cookies and
                                                    similar
                                                    technologies to enhance your user experience, such as remembering login
                                                    credentials or storing preferences. These technologies may collect
                                                    details about your browsing activities, preferences, and interactions
                                                    with our Website.</li>
                                            </ul>
                                            <h2 class="mt-4">2. How We Use Your Information</h2>

                                            <p>The information we collect is used in various ways to ensure
                                                that we can provide you with the best possible experience while using our
                                                Website.</p>

                                            <h3>Providing Services</h3>

                                            <p>The primary purpose for which we use your personal information
                                                is to deliver our services, including:</p>

                                            <ul>

                                                <li>Offering moving quotes based on the details you provide.</li>

                                                <li>Connecting you with moving companies that best match your needs.</li>

                                                <li>Facilitating communication between you and the service providers.</li>

                                                <li>Processing your transactions and payments securely.</li>

                                                <li>Keeping you informed about the status of your moving request, changes,
                                                    or updates.</li>

                                            </ul>



                                            <h3 class="mt-4">Improving User Experience</h3>

                                            <p>We use both personal and non-personal information to improve
                                                your experience on our Website:</p>

                                            <ul>

                                                <li><strong>Personalized Services:</strong> We use your preferences and
                                                    browsing history to recommend services that may interest you or to
                                                    display personalized content.</li>

                                                <li><strong>Website Improvements:</strong> We analyze usage patterns to
                                                    enhance the Website’s functionality, layout, and user interface. This
                                                    ensures that the Website remains efficient, user-friendly, and secure.
                                                </li>

                                                <li><strong>Customization:</strong> We may customize your user experience
                                                    based on your location, browsing history, and preferences, improving the
                                                    relevancy of the services we provide.</li>



                                            </ul>



                                            <h3 class="mt-4">Communication</h3>

                                            <p>We use your contact details to communicate with you in several
                                                ways:</p>

                                            <ul>

                                                <li>

                                                    <strong>Service-Related Communications:</strong> We send you information
                                                    about your moving request or any follow-up actions needed.

                                                </li>

                                                <li>

                                                    <strong>Marketing Communications:</strong> With your consent, we may
                                                    send promotional emails about our services, offers, and updates. You may
                                                    opt out of these communications at any time.

                                                </li>

                                                <li>

                                                    <strong>Customer Support:</strong> We may contact you for inquiries or
                                                    technical support.

                                                </li>

                                            </ul>





                                            <h3 lass="mt-4">Legal Obligations and Security</h3>

                                            <p>We may use your information to comply with legal requirements,
                                                enforce our terms of service, and protect our Website and users. This
                                                includes:</p>

                                            <ul>

                                                <li>

                                                    Responding to legal requests such as subpoenas, warrants, or other legal
                                                    processes.

                                                </li>

                                                <li>

                                                    Protecting our rights, property, and safety, as well as the rights,
                                                    property, and safety of our users and the public.

                                                </li>

                                                <li>

                                                    Preventing fraud, misuse, and other illegal activities on our Website.

                                                </li>

                                            </ul>











                                            <h2 class="mt-4">3. How We Protect Your Information</h2>

                                            <p>We understand that your personal information is valuable, and
                                                we take robust steps to protect it. We employ various security measures to
                                                ensure that your data remains secure.</p>

                                            <h3>

                                                Encryption

                                            </h3>

                                            <p>

                                                All sensitive information, such as credit card numbers, is encrypted using
                                                secure encryption protocols (SSL/TLS). This ensures that your personal data
                                                is securely transmitted over the internet.

                                            </p>

                                            <h3>

                                                Secure Servers

                                            </h3>

                                            <p>

                                                We store your personal information on secure servers that are protected from
                                                unauthorized access through firewalls, password protection, and other
                                                physical and technological security measures.

                                            </p>

                                            <h3>

                                                Access Control

                                            </h3>

                                            <p>

                                                We implement strict access controls to ensure only authorized personnel can
                                                access your personal information. All employees with access to this
                                                information are trained in data protection practices and are required to
                                                follow strict guidelines.

                                            </p>



                                            <p>

                                                Despite our efforts to protect your data, no data transmission method over
                                                the internet can be guaranteed to be 100% secure. While we strive to protect
                                                your personal information, we cannot guarantee its absolute security. </p>





                                            <h2 class="mt-4 ">4. Sharing Your Information</h2>

                                            <p>We may share your personal information in the following
                                                situations:</p>





                                            <h3>Service Providers</h3>

                                            <p>

                                                We may share your information with third-party moving companies,
                                                contractors, or service providers to fulfill your requests. These partners
                                                are obligated to use your data only to provide the services we request and
                                                are not permitted to use your personal information for other purposes.

                                            </p>

                                            <h3>

                                                Legal Compliance

                                            </h3>

                                            <p>

                                                We may disclose your personal information if required by law or if we
                                                believe such action is necessary to:

                                            </p>

                                            <ul>

                                                <li>

                                                    Comply with a legal obligation, such as a subpoena or court order.

                                                </li>

                                                <li>

                                                    Protect the rights, property, and safety of My Moving Journey, its
                                                    users, or others.

                                                </li>

                                                <li>

                                                    Prevent or investigate potential violations of our Terms of Service or
                                                    illegal activities.

                                                </li>

                                            </ul>



                                            <h3>

                                                Business Transfers

                                            </h3>

                                            <p>In the event of a merger, acquisition, or sale of all or a portion of our
                                                assets, your information may be transferred to the new owner as part of the
                                                business transfer process. We will notify you if such a transfer takes
                                                place.</p>



                                            <h3>With Your Consent</h3>

                                            <p>

                                                In certain cases, we may request your consent to share your personal data
                                                for specific purposes. You can withdraw this consent at any time.

                                            </p>



                                            <h2 class="mt-4">5. Cookies and Tracking Technologies</h2>

                                            <p>Cookies are small text files placed on your device to store
                                                preferences and session information and track usage patterns. We use cookies
                                                and similar technologies to:</p>

                                            <ul>

                                                <li>

                                                    Remember your preferences and login details so you do not have to
                                                    re-enter them each time you visit our Website.

                                                </li>

                                                <li>

                                                    Analyze user activity to optimize our Website's design and
                                                    functionality.

                                                </li>



                                                <li>

                                                    Provide tailored advertising based on your browsing behavior.

                                                </li>

                                            </ul>

                                            <p>You can manage your cookie preferences by adjusting your browser settings.
                                                However, disabling cookies may affect certain website features, such as
                                                login functionality or personalized recommendations.</p>









                                            <h2 class="mt-4">6. Third-Party Links</h2>

                                            <p>Our Website may contain links to third-party websites for your
                                                convenience. These third-party sites may have their own privacy policies,
                                                which may differ from ours. We do not endorse or take responsibility for
                                                these external websites' content or privacy practices.</p>

                                            <p>We encourage you to review the privacy policies of any
                                                third-party sites you visit to understand how your information is handled.
                                            </p>





                                            <h2 class="mt-4">

                                                7. Your Rights Regarding Your Data

                                            </h2>

                                            <p>As a user of our Website, you have the following rights
                                                regarding your personal data:</p>

                                            <h3>Access to Your Data</h3>

                                            <p>You have the right to request access to the personal data we
                                                hold about you. If you wish to review or obtain copies of your data, please
                                                contact us at contact@mymovingjourney.com.</p>

                                            <h3>Correction of Data</h3>

                                            <p>If you believe any of the personal data we hold about you is
                                                incorrect or incomplete, you have the right to request that we correct or
                                                update that information.</p>

                                            <h3>Deletion of Data</h3>

                                            <p>You may request the deletion of your personal information. We
                                                will honor your request, subject to any legal obligations we may have to
                                                retain certain data.</p>

                                            <h3>Opting-Out of Marketing Communications</h3>

                                            <p>If you no longer wish to receive marketing communications from
                                                us, you can opt out by following the unsubscribe link in our emails or by
                                                contacting us directly.</p>

                                            <h3>Data Portability</h3>

                                            <p>In some cases, you may request that we transfer your personal
                                                data to another service provider. We will work with you to facilitate the
                                                transfer where applicable.</p>



                                            <h2 class="mt-4">

                                                8. Children’s Privacy

                                            </h2>

                                            <p>Our Website is not intended for individuals under the age of
                                                18. We do not knowingly collect personal information from children. If we
                                                become aware that we have inadvertently collected personal information from
                                                a child under 18, we will take immediate steps to delete such data from our
                                                systems.</p>





                                            <h2 class="mt-4">

                                                9. International Data Transfers

                                            </h2>

                                            <p>If you are located outside of the United States and choose to
                                                use our Website, please be aware that your personal data may be transferred
                                                to and stored in countries where data protection laws may differ from those
                                                in your jurisdiction. By using our services, you consent to the transfer of
                                                your data to such countries.</p>



                                            <h2>10. Changes to This Privacy Policy</h2>

                                            <p>We reserve the right to update or change this Privacy Policy at any time to
                                                reflect changes in our practices or for operational, legal, or regulatory
                                                reasons. When we make changes, we will update the "Effective Date" at the
                                                top of this policy. We encourage you to periodically review this policy to
                                                stay informed about how we are protecting your personal information.</p>





                                            <h2>

                                                11. Contact Us

                                            </h2>

                                            <p>If you have any questions, concerns, or requests regarding this Privacy
                                                Policy or our data practices, please contact us at:</p>

                                            <ul>

                                                <li><strong>Email:</strong> contact@mymovingjourney.com</li>

                                                <li><strong>Phone:</strong> <a href="tel:(786) 980-3050">(786) 980-3050</a>
                                                </li>

                                                <li><strong> Address:</strong> 3680 Wilshire Blvd Ste P04 - 1032 Los
                                                    Angeles, CA 90010 United States</li>

                                            </ul>







                                        </div>

                                    </div>

                                </section>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Privacy Policy",
  "url": "https://mymovingjourney.com/privacy-policy",
  "description": "Read our privacy policy and learn how we protect your personal information on MyMovingJourney platform"
}
</script>

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "MyMovingJourney",
  "url": "https://mymovingjourney.com",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://mymovingjourney.com/search?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "https://mymovingjourney.com"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Privacy Policy",
      "item": "https://mymovingjourney.com/privacy-policy"
    }
  ]
}
</script>
@endsection
