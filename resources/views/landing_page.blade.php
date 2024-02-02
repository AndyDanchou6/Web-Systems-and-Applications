<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kore Wa Mendo Desu</title>
    <link rel="stylesheet" href="{{ asset('css/landing_page.css') }}" />

    <style>
        /* Add some styling for smooth scrolling */
        body {
            scroll-behavior: smooth;
        }

        /* Style your navigation links */
        nav a {
            text-decoration: none;
           
            margin: 0 15px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h1>Kore Wa Mendo Desu</h1>
    </header>
    <nav>
        <a href="#about">About</a>
        <a href="#contacts">Contacts</a>
        <a href="{{ route('login') }}">Sign In</a>
    </nav>
    <div id="intro">
        <p id="tagline">Escape From Reality Into The World Of Dreams And Fantasy</p>
    </div>
    <div id="about">
        <div class="about_wrap">
            <h2 id="read">Read Novels</h2>
            <p class="about_header">Bored at home but don't want to go outside?</p>
            <p class="about_contents">Here at Kore Wa Mendo Desu we bring to you huge variety of novels written by authors all over the world. The only thing you need is some time 
                so sit back, relax and escape into the world of dreams and fantasy.
            </p>
        </div>
        <div class="about_wrap">
            <h2 id="write">Showcase your writing skills</h2>
            <p class="about_header">Wan't to express yourself through writing?</p>
            <p class="about_contents">Here at Kore Wa Mendo Desu you can start to write your own story and show it to your friends online. Let your creative thoughts flow 
                and be your guide as you explore the vast world of imagination and bring it to life through pen and paper.
            </p>
        </div>
    </div>
    <div id="contacts">
        <h2 id="more_info">For more Info</h2>
        <div id="contact_info">
            <p>Facebook</p>
            <img src="{{ asset('bg_img/fb_logo.jpeg') }}" alt="fb">
            <p>Email</p>
            <img src="{{ asset('bg_img/email.png') }}" alt="fb">
            <p>Instagram</p>
            <img src="{{ asset('bg_img/insta_icon.png') }}" alt="fb">
            <p>Phone No.</p>
            <img src="{{ asset('bg_img/contact_icon.png') }}" alt="fb">
        </div>
    </div>
    <div id="footer">
        <h4>Kore Wa Mendo Desu</h4>
        <p>All rights Reserved 2024</p>
    </div>
</body>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select all links inside the navigation
            const navLinks = document.querySelectorAll('nav a');

            // Add click event listener to each link
            navLinks.forEach(link => {
                link.addEventListener('click', function (e) {

                    if (this.getAttribute('href') === "{{ route('login') }}") {
                    return; // Perform default navigation
                }
                    e.preventDefault();

                    // Get the target section's id from the href attribute
                    const targetId = this.getAttribute('href').substring(1);

                    // Find the target section
                    const targetSection = document.getElementById(targetId);

                    // Scroll to the target section smoothly
                    targetSection.scrollIntoView({ behavior: 'smooth' });
                });
            });
        });
    </script>
</html>
