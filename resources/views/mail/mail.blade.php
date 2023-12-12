<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Oracles of GOD</title>
	</head>
    <body>


        <div style="display: flex; height: 100%; background: #f4f4f4;">
            <div style="width: 76%; margin: auto; background: #ffff; padding: 26px; border: 2px solid #E5E8E5; border-radius: 13px;">
                <div style="text-align: center; border-bottom: 1px solid #ccc; padding-bottom: 14px;">
                    <h1 style="margin-top: 10px;">
                        The Oracles of God 
                    </h1>
                </div>

                <div style="text-align: center;">
                    <h3>Sent from The Oracles of God website contact form</h3>
                </div>

                <div style="font-size: 18px;">
                    <div style="padding-bottom: 8px;"><span style="padding-left: 13px; font-weight: 600;">Name:</span> {{ $contact['name'] }} </div>
                    <div style="padding-bottom: 8px;"><span style="padding-left: 13px; font-weight: 600;">E-mail:</span> {{ $contact['email'] }} </div>
                    <div style="padding-bottom: 8px;"><span style="padding-left: 13px; font-weight: 600;">Subject:</span> {{ $contact['subject'] }} </div>
                    <div style="padding-bottom: 8px;"><span style="padding-left: 13px; font-weight: 600;">Message:</span></div>
                    <p style="padding: 0 7%;"> {{ $contact['message'] }} </p>
                </div>
            </div>
        </div>


    </body>
</html>