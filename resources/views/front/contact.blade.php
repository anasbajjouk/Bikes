@extends('layouts.front')

@section('title', 'Home')

@section('content')

<!--Start Blog-->
<div class="blog">
    <div class="container">
        <ul class="tz-breadcrumbs">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="current">
                Contact
            </li>
        </ul>
        <div class="blog-container">
            <div class="row">
            <div class="col-md-4">

                <!--Blog Sidebar-->
                <div class="blog-sidebar">
                    <aside class="contact-info widget no-border">
                        <h4 class="widget-title">Contact info</h4>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
                        <ul>
                            <li>
                                <span>Address</span>
                                <address>123 Sky Tower address name, Los Algeles, USA, Country, 01234</address>
                            </li>
                            <li>
                                <span>Phone</span> (012) 345 6789
                            </li>
                            <li>
                                <span>Email:</span> info@bikesport.com
                            </li>
                        </ul>
                    </aside>
                </div>
                <!--End Blog Sidebar-->
            </div>
            
            <div class="col-md-8 tz-blog-content">
                <h1 class="large-ttle">Contact Us</h1>
                <div id="contact-form" class="contact-respond">
                    <h3 class="tz-title">Leave us a message</h3>

                    @include('partials.success')
                    @include('partials.errors')

                    <form id="commentform" class="contact-form-7" method="POST" action="{{ route('front.contact') }}">
                        {{ csrf_field() }}
                        <p class="comment-for-author">
                            <input type="text" class="author" placeholder="Name" name="name">
                            <i class="fa fa-user"></i>
                        </p>
                        <p class="comment-for-email">
                            <input type="email" class="email" placeholder="Email" name="email">
                            <i class="fa fa-envelope"></i>
                        </p>
                        <p class="comment-for-url">
                            <select name="problem" id="input" class="form-control" required="required">
                                <option value="general">General</option>
                                <option value="order">Orders</option>
                                <option value="delivery">Delivery</option>
                                <option value="other">Other</option>
                            </select>

                        </p>
                        <p class="comment-for-content">
                            <textarea class="comment" name="comment" placeholder="Your message ..."></textarea>
                            <i class="fa fa-comment"></i>
                        </p>
                        <p class="comment-for-submit">
                            <input name="submit" type="submit" id="submit" class="submit" value="Submit form">
                        </p>
                    </form>
                </div>
                <div class="map">
                    <h3 class="tz-title">Get in touch with us</h3>
                    <div class="map-iframe">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d423284.59051352716!2d-118.41173249999996!3d34.020498899999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s123+Sky+Tower+address+name%2C+Los+Algeles%2C+USA%2C+Country%2C!5e0!3m2!1sen!2s!4v1430668657672"></iframe>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!--End Start Blog-->

<!--Start partners-->
<div class="container">
    <ul class="tz-partners">
        <li>
            <a href="#">
                <img src="images/clients/partner1.jpg" alt="partner">
            </a>
        </li>
        <li>
            <a href="#">
                <img src="images/clients/partner2.jpg" alt="partner">
            </a>
        </li>
        <li>
            <a href="#">
                <img src="images/clients/partner3.jpg" alt="partner">
            </a>
        </li>
        <li>
            <a href="#">
                <img src="images/clients/partner4.jpg" alt="partner">
            </a>
        </li>
        <li>
            <a href="#">
                <img src="images/clients/partner5.jpg" alt="partner">
            </a>
        </li>
        <li>
            <a href="#">
                <img src="images/clients/partner6.jpg" alt="partner">
            </a>
        </li>
        <li>
            <a href="#">
                <img src="images/clients/partner1.jpg" alt="partner">
            </a>
        </li>
        <li>
            <a href="#">
                <img src="images/clients/partner2.jpg" alt="partner">
            </a>
        </li>
        <li>
            <a href="#">
                <img src="images/clients/partner5.jpg" alt="partner">
            </a>
        </li>
        <li>
            <a href="#">
                <img src="images/clients/partner3.jpg" alt="partner">
            </a>
        </li>
        <li>
            <a href="#">
                <img src="images/clients/partner4.jpg" alt="partner">
            </a>
        </li>
        <li>
            <a href="#">
                <img src="images/clients/partner6.jpg" alt="partner">
            </a>
        </li>
    </ul>
</div>
<!--End partners-->

@endsection
