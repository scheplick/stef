<?php
/*
Plugin Name: Trading Begin Page
Description: A cinematic trading intro with a blinking circle, typewriter effect, and a dramatic entrance.
Version: 1.2
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
                    font-size: 18px; /* Smaller font for a more subtle feel */
                    text-align: center;
                    width: 80%;
                    max-width: 500px;
                    opacity: 0;
                    display: inline-block;
                    overflow: hidden;
                    white-space: nowrap;
                    border-right: 2px solid white;
                }

                .hidden { display: none; }

                .link {
                    font-size: 14px; /* Smaller "Enter" text */
                    margin-top: 20px;
                    opacity: 0;
                    transition: opacity 3s ease-in-out; /* Slower and more dramatic fade-in */
                }

                .link a {
                    color: white;
                    text-decoration: none;
                    border-bottom: 1px solid white;
                    padding-bottom: 3px;
                    letter-spacing: 2px;
                }

                .link a:hover {
                    color: grey;
                    border-bottom: 1px solid grey;
                }
            </style>
        </head>
        <body>
            <div class="circle" id="circle"></div>
            <div id="text"></div>
            <div class="link hidden" id="link"><a href="https://scheplick.com/investing_guides/">Enter</a></div>

            <script>
                setTimeout(() => {
                    document.getElementById("circle").style.display = "none"; // Hide blinking circle after 3 sec
                    document.getElementById("text").style.opacity = "1"; // Show text container
                    typeWriter();
                }, 3000); // 3-second delay before typing starts

                function typeWriter() {
                    const textElement = document.getElementById("text");
                    const text = "Few other endeavors test the soul like trading.";
                    let i = 0;

                    function type() {
                        if (i < text.length) {
                            textElement.innerHTML += text.charAt(i);
                            i++;
                            setTimeout(type, 120); // Even slower typing speed (120ms per letter)
                        } else {
                            setTimeout(() => {
                                document.getElementById("link").classList.remove("hidden");
                                document.getElementById("link").style.opacity = "2"; // Slower fade-in for "Enter"
                            }, 1600);
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
