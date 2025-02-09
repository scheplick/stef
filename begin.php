<?php
/*
Plugin Name: Trading Begin Page
Description: A blinking circle followed by a dramatic typewriter effect for text, leading to a call-to-action link.
Version: 1.0
Author: Your Name
*/

function trading_begin_page() {
    if (is_page('begin')) {
        echo '<!DOCTYPE html>
        <html>
        <head>
            <title>Begin</title>
            <style>
                body {
                    background-color: black;
                    color: white;
                    font-family: Arial, sans-serif;
                    text-align: center;
                    margin: 0;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    overflow: hidden;
                }

                .circle {
                    width: 10px;
                    height: 10px;
                    background-color: white;
                    border-radius: 50%;
                    animation: blink 1s infinite;
                }

                @keyframes blink {
                    0% { opacity: 1; }
                    50% { opacity: 0; }
                    100% { opacity: 1; }
                }

                #text {
                    font-size: 24px;
                    text-align: center;
                    width: 80%;
                    max-width: 600px;
                    opacity: 0;
                    display: inline-block;
                    overflow: hidden;
                    white-space: nowrap;
                    border-right: 3px solid white;
                }

                .hidden { display: none; }

                .link {
                    font-size: 28px;
                    margin-top: 20px;
                    opacity: 0;
                    transition: opacity 1s ease-in-out;
                }

                .link a {
                    color: white;
                    text-decoration: none;
                    border-bottom: 2px solid white;
                }

                .link a:hover {
                    color: grey;
                    border-bottom: 2px solid grey;
                }
            </style>
        </head>
        <body>
            <div class="circle" id="circle"></div>
            <div id="text"></div>
            <div class="link hidden" id="link"><a href="#">Enter my domain</a></div>

            <script>
                setTimeout(() => {
                    document.getElementById("circle").style.display = "none"; // Hide blinking circle
                    document.getElementById("text").style.opacity = "1"; // Show text container
                    typeWriter();
                }, 1000); // 1-second delay before typing starts

                function typeWriter() {
                    const textElement = document.getElementById("text");
                    const text = "Few other endeavors test the soul like trading.";
                    let i = 0;

                    function type() {
                        if (i < text.length) {
                            textElement.innerHTML += text.charAt(i);
                            i++;
                            setTimeout(type, 50); // Typing speed
                        } else {
                            document.getElementById("link").classList.remove("hidden");
                            document.getElementById("link").style.opacity = "1"; // Fade in the link
                        }
                    }

                    type();
                }
            </script>
        </body>
        </html>';
        
        exit;
    }
}
add_action('template_redirect', 'trading_begin_page');
