<div dir="ltr">
    <div>
      <font face="verdana, sans-serif"><br /></font>
    </div>
    <font face="verdana, sans-serif"
      >
      {{-- <img
        src="{{ asset('assets/image/bell.png') }}"
        alt="72.png"
        width="45"
        height="45"
        style="margin-right: 0px"
        data-image-whitelisted=""
        class="CToWUd"
        data-bit="iit" />&nbsp;<font size="4"
        > --}}
        <b>{{ $contactMover->name }}</b>&nbsp; has choosen your company for Moving.<br /></font
      ><br
    /></font>
    <div>
      <font face="verdana, sans-serif"
        ><b>Zip From:</b>&nbsp;{{ $contactMover->zip_from }}<br
      /></font>
    </div>
    <div>
      <font face="verdana, sans-serif"
        ><b>Email</b>: **********@gmail.***<br /><b>Phone</b>: ********</font
      >
    </div>
    <div>
      <font face="verdana, sans-serif"><br /></font>
    </div>
    <div>
      <font face="verdana, sans-serif"
        >------------------------------<wbr />------------------------------<wbr />------------------------------<wbr />-------------</font
      >
    </div>
    <div>
      <font face="verdana, sans-serif"><br /></font>
    </div>
    <div>
        <font color="#111539" face="verdana, sans-serif"><b><u>Moving Details</u></b></font>
    </div>
    <div>
        <font color="#111539" face="verdana, sans-serif"><b><u><br /></u></b></font>
    </div>
    <font face="verdana, sans-serif"><b>What is the moving date?<br /></b>{{ $contactMover->date }}</font>
    <div>
        <font face="verdana, sans-serif"><b>What is the drop off location or
                zip&nbsp;code?<br /></b>{{ $contactMover->zip_to }}<br />
            <b> What is your moving size?</b>
            <br />{{ $contactMover->move_size }}
            <br /><br />------------------------------<wbr />------------------------------<wbr />------------------------------<wbr />-------------<br /><b><br /></b>
        </font>
    </div>
    <div>
        <font face="verdana, sans-serif">
            Thank you for choosing <a href="https://mymovingjourney.com/">My Moving Journey</a>. We look forward to providing
            you with an exceptional experience and are committed to serving your business needs. If you have any
            queries, contact us at <a href="mailto:contact@mymovingjourney.com">contact@mymovingjourney.com</a>.
            <br>
            <br>
            Best Regards,
            <br>
            <br>
            My Moving Journey
            <br>
            <a href="https://mymovingjourney.com/">https://mymovingjourney.com/</a>
            <br>
            <br>
            <img src="https://mymovingjourney.com/assets/img/logo.png" alt="logo" width="15%">
        </font>

    </div>
</div>
