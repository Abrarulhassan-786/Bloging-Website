@extends('layouts.app')
@section('content')
@section('title', 'SPJ Blogging')
@section('meta_description', 'Blogging Website')
@section('meta_keyword', 'SPJ CODER')

<div id="carouselcategory" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselcategory" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselcategory" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselcategory" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        @foreach ($category as $categoryitem)
            <a href="{{ url('tutorial/' . $categoryitem->slug) }}" class="text-decoreation-none">
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('upload/category/' . $categoryitem->image) }}"
                        class="d-block w-100 carousel-image" style="max-height: 91vh;object-fit: cover"
                        alt="{{ $categoryitem->name }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $categoryitem->name }}</h5>
                        {{-- <p>{{ $categoryitem->slug }}</p> --}}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselcategory" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselcategory" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container my-5">
    <div class="row g-4 align-items-center" id="aboutus">
        <div class="col-lg-8">
            <h2 class=" text-primary">About SPJ-Blogs</h2>
            <p>
                Welcome to SPJ-CODER Blogger! Our mission is to provide insightful and engaging content about the latest
                trends and developments in the tech world. From coding tutorials to deep dives into emerging
                technologies, we aim to empower our readers with knowledge and skills.
            </p>
            <p>
                Whether you're a seasoned developer or just starting your journey in tech, SPJ-CODER Blogger offers
                valuable resources and community support. Our team of experienced writers and tech enthusiasts is
                passionate about sharing their expertise and helping you stay ahead in the rapidly evolving tech
                landscape. Thank you for joining us in exploring the fascinating world of technology!
            </p>
            <a href="https://github.com/Abrarulhassan-786" class="btn btn-danger mt-3">Learn More About Us</a>
        </div>
        <div class="col-lg-4">
            <img src="https://clickfirstmarketing.com/wp-content/uploads/Purpose-of-Blogging.jpeg" alt="About Us Image"
                class="img-fluid rounded">
        </div>
    </div>
    <style>
        .category-box {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        /* Keyframes for vibration effect */
        @keyframes vibrate {
            0% {
                transform: translateX(0);
            }

            10% {
                transform: translateX(-4px);
            }

            20% {
                transform: translateX(4px);
            }

            30% {
                transform: translateX(-4px);
            }

            40% {
                transform: translateX(4px);
            }

            50% {
                transform: translateX(-4px);
            }

            60% {
                transform: translateX(4px);
            }

            70% {
                transform: translateX(-4px);
            }

            80% {
                transform: translateX(4px);
            }

            90% {
                transform: translateX(-2px);
            }

            100% {
                transform: translateX(2px);
            }
        }

        .category-box:hover {
            animation: vibrate 0.10s ease;
            /* Apply vibration animation on hover */
        }
    </style>
    {{-- List of post Categoris start --}}
    <div class="container mt-5">
        <h2 class="mb-4">Post Category List</h2>
        <div class="row g-3"> <!-- g-3 adds gutters between columns -->
            <!-- Categories List -->
            @foreach ($category as $categoryitem)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="category-box fw-bold">{{ $categoryitem->name }}</div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- List of post category end here --}}


    {{-- Purpose of bloggin website  --}}
    <div class="row g-4 align-items-center my-5" id="purposeblog">
        <div class="col-lg-4">
            <img src="https://getting2theroots.com/wp-content/uploads/How-To-Find-Your-Purpose-In-Blogging.jpg"
                alt="About Us Image" class="img-fluid rounded">
        </div>
        <div class="col-lg-8">
            <h2 class=" text-warning">Purpose Blogs</h2>
            <p>
                At SPJ-CODER Blogger, our goal is to deliver high-quality and insightful content that keeps you informed
                about the ever-evolving world of technology. We focus on providing practical coding tutorials, expert
                analysis of the latest tech trends, and in-depth explorations of emerging technologies to help you stay
                ahead in your tech journey.
            </p>
            <p>
                Our platform is designed to support both seasoned developers and those new to the tech field. By
                offering a wealth of resources, tips, and community support, we strive to foster learning and growth
                within the tech community. Join us as we delve into the latest innovations and share valuable knowledge
                that can propel your career and passion for technology forward.
            </p>
        </div>
    </div>
    {{-- end section here --}}

    {{-- latest post here start  --}}

    <div class="container mt-5">
        <h2 class="mb-4">Latest Posts</h2>
        <div class="row g-3">
            @foreach ($latest_post as $latestpost)
                <div class="col-md-4">
                    <div class="card post-box">
                        <img src="{{ asset('upload/category/' . $latestpost->category->image) }}" class="card-img-top"
                            alt="Post Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $latestpost->name }}</h5>
                            <p class="card-text">{!! $latestpost->description !!}</p>
                            <a href="{{url('tutorial/'.$latestpost->category->slug)}}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .post-box {
            background-color: #ffffff;
            /* White background for posts */
            border: 1px solid #ddd;
            /* Light border for separation */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Shadow for the post box */
            border-radius: 4px;
            /* Rounded corners */
            height: 100%;
            /* Ensure the card takes full height of the column */
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            /* Smooth transition for hover effects */
        }
    
        .post-box:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            /* Darker shadow on hover */
            transform: scale(1.05);
            /* Slightly enlarge the card on hover */
        }
    
        .card-img-top {
            height: 200px;
            /* Fixed height for images */
            object-fit: cover;
            /* Ensure the image covers the area without distortion */
        }
    
        .card-body {
            flex: 1;
            /* Allow card body to take up remaining space */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Space out the content evenly */
        }

        .btn-primary {
            margin-top: auto;
            /* Push button to the bottom */
        }
    </style>
    
    {{-- latest post here end --}}

</div>
<!-- Footer -->
<footer class="footer mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>About Us</h5>
                <p>Welcome to SPJ-CODER Blogger! Our mission is to provide insightful and engaging content about the
                    latest
                    trends and developments in the tech world.</p>
            </div>
            <div class="col-md-3">
                <h5>Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#aboutus">About us</a></li>
                    <li><a href="#purposeblog">Purpose</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Follow Us</h5>
                <div class="social-icons">
                    <a href="https://www.linkedin.com/in/abrar-ul-hassan2002/" target="_blank">
                        <img src="https://img.icons8.com/color/48/000000/linkedin.png" alt="Twitter">
                    </a>
                    <a href="https://github.com/Abrarulhassan-786/Bloging-Website" target="_blank">
                        <img src="https://img.icons8.com/color/48/000000/github--v1.png" alt="GitHub">
                    </a>
                    <a href="https://web.facebook.com/profile.php?id=61560268982366" target="_blank">
                        <img src="https://img.icons8.com/color/48/000000/facebook--v1.png" alt="Facebook">
                    </a>
                    <!-- Add more social media icons as needed -->
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <p>&copy; 2024 <span class="text-primary"> SPJ-CODER (ABRAR) </span>. All rights reserved.</p>
        </div>
    </div>
</footer>
<style>
    .footer {
        background-color: #ffffff;
        /* Light background color */
        padding: 20px 0;
        /* Vertical padding */
    }

    .footer a {
        color: #6c757d;
        /* Text color for links */
    }

    .footer a:hover {
        color: #343a40;
        /* Darker text color on hover */
    }

    .footer .social-icons img {
        width: 24px;
        /* Size of social media icons */
        margin: 0 10px;
        /* Horizontal spacing between icons */
    }
</style>

@endsection
