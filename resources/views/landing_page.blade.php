<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kore Wa Mendo Desu</title>
    <link rel="stylesheet" href="{{ asset('css/landing_page.css') }}" />
</head>

<body>
    <header>
        <h1>Kore Wa Mendo Desu</h1>
    </header>
    <nav>
        <a href="{{ route('login') }}">Home</a>
        <a href="#about">About</a>
        <a href="#contacts">Contacts</a>
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

</html>
