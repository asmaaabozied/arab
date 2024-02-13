@extends('mail::layouts.email')
@section('content')
    <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%"
           style="table-layout: fixed;" data-muid="948e3f3f-5214-4721-a90e-625a47b1c957"
           data-mc-module-version="2019-10-22">
        <tbody>
        <tr>
            <td style="padding:20px 20px 10px 20px; line-height:38px; text-align:inherit; background-color:#ffffff;"
                height="100%" valign="top" bgcolor="#ffffff" role="module-content">
                <div>
                    <h1 style="text-align: center">
            <span style="color: #7276ff; font-family: tahoma, geneva, sans-serif; font-size: 20px">
              <strong>{{trans('mail::email.Welcome to the Arab Workers community')}}</strong>
            </span>
                    </h1>
                    <div></div>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align:inherit; background-color:#ffffff;" height="100%" valign="top" bgcolor="#ffffff"
                role="module-content">
                <div>
                    <h1 style="text-align: center">
            <span style="color: #7276ff; font-family: tahoma, geneva, sans-serif; font-size: 20px">
              <strong>{{trans('mail::email.EmailVerificationForm')}}</strong>
            </span>
                    </h1>
                    <div></div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" class="module" data-role="module-button" data-type="button"
           role="module" style="table-layout:fixed;" width="100%" data-muid="d050540f-4672-4f31-80d9-b395dc08abe1">
        <tbody>
        <tr>
            <td align="center" bgcolor="#ffffff" class="outer-td"
                style="padding:0px 0px 0px 0px; background-color:#ffffff;">
                <table border="0" cellpadding="0" cellspacing="0" class="wrapper-mobile" style="text-align:center;">
                    <tbody>
                    <tr>
                        <td align="center" bgcolor="#0099ff" class="inner-td"
                            style="border-radius:6px; font-size:16px; text-align:center; background-color:inherit;">
                            <a href="{{route('api.verify.employer.account',[$token,$employer_number])}}"
                               style="background-color:#0099ff; border:1px solid #ffbe00; border-color:#ffbe00; border-radius:0px; border-width:1px; color:#ffffff; display:inline-block; font-size:18px; font-weight:700; letter-spacing:0px; line-height:normal; padding:12px 40px 12px 40px; text-align:center; text-decoration:none; border-style:solid; font-family:tahoma,geneva,sans-serif;border-radius: 16px"
                               target="_blank">{{trans('mail::email.activeAccount')}}</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%"
           style="table-layout: fixed;" data-muid="a10dcb57-ad22-4f4d-b765-1d427dfddb4e"
           data-mc-module-version="2019-10-22">
        <tbody>
        <tr>
            <td style="padding:20px 20px 10px 20px; line-height:18px; text-align:inherit; background-color:#ffffff;"
                height="100%" valign="top" bgcolor="#ffffff" role="module-content">
                <div>
                    <h2 style="text-align: center">
            <span
                style="font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: right; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline; color: #08af7c; font-family: tahoma, geneva, sans-serif; font-size: 14px">
              <strong>{{trans('mail::email.Please make sure you follow the policies and guidelines')}}</strong>
            </span>
                    </h2>
                    <h2 style="text-align: center">
            <span
                style="font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: right; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline; color: #08af7c; font-family: tahoma, geneva, sans-serif; font-size: 12px">
              <strong> {{trans('mail::email.In order to be able to complete the available tasks successfully')}} &nbsp;</strong>
            </span>
                    </h2>
                    <div></div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%"
           style="table-layout: fixed;" data-muid="7770fdab-634a-4f62-a277-1c66b2646d8d">
        <tbody>
        <tr>
            <td style="padding:0px 0px 20px 0px;" role="module-content" bgcolor="#ffffff"></td>
        </tr>
        </tbody>
    </table>
    <table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%"
           style="table-layout: fixed;" data-muid="c37cc5b7-79f4-4ac8-b825-9645974c984e">
        <tbody>
        <tr>
            <td style="padding:0px 0px 30px 0px;" role="module-content" bgcolor="#ffffff"></td>
        </tr>
        </tbody>
    </table>
@stop
