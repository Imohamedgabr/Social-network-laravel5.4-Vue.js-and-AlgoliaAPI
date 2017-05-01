<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Social Network</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/popup.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

                <div class="content">
                    <div class="title m-b-md">
                        Welcome To Our Social Network
                    </div>

                    <div class="links">
                        Thank you for being a member!
                    </div>
                        
                            
                    <br>
                    <!-- Trigger/Open The Modal -->
                    <button id="myBtn">Contact US</button>

                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <span class="close">&times;</span>

                    <form action="#" id="form" method="post" name="form">
                        <img id="close" onclick ="div_hide()">
                        <h2>Contact Us</h2>
                        <hr>
                        <input id="name" name="name" placeholder="Name" type="text">
                        <input id="email" name="email" placeholder="Email" type="text">
                        <textarea id="msg" name="message" placeholder="Message"></textarea>
                        <a href="javascript:%20check_empty()" id="submit">Send</a>
                    </form>

                  </div>

                </div>
            </div>
        </div>

        <script type="text/javascript">
          // Get the modal
            var modal = document.getElementById('myModal');

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </body>
</html>
