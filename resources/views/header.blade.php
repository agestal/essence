<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>


    <title>Essence Salones Low Cost - Redondela </title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Page-2.css" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Dancing+Script:400,500,600,700">
    @laravelPWA
    <script >
        $(document).ready(function() {
            let deferredPrompt;
            const buttonAdd = document.querySelector('#buttonAdd');
            window.addEventListener('beforeinstallprompt', function(event) {
                // Prevent Chrome 67 and earlier from automatically showing the prompt
                e.preventDefault();
                // Stash the event so it can be triggered later.
                deferredPrompt = e;
            });

            // Installation must be done by a user gesture! Here, the button click
            buttonAdd.addEventListener('click', (e) => {
            // hide our user interface that shows our A2HS button
            // Show the prompt+
            e.preventDefault();
            deferredPrompt.prompt();
            // Wait for the user to respond to the prompt
            deferredPrompt.userChoice
                .then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
                    console.log('User accepted the A2HS prompt');
                } else {
                    console.log('User dismissed the A2HS prompt');
                }
                deferredPrompt = null;
                });
            });
        })
    </script>
  </head>
