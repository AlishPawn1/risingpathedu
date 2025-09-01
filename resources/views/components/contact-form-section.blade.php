@if($formType === 'simple')
<div class="single-contact-form">
    <h3 class="wid-title">Quick Contact</h3>
    <form action="{{ route('contact.store') }}" method="POST" id="contact-form" class="message-form">
        @csrf
        <div class="single-form-input">
            <input type="text" name="name" placeholder="your name" required>
        </div>
        <div class="single-form-input">
            <input type="email" name="email" placeholder="email address" required>
        </div>
        <div class="single-form-input">
            <textarea name="message" placeholder="message" required></textarea>
        </div>
        <button class="theme-btn" type="submit"><span>Submit</span></button>
    </form>
</div>

@elseif($formType === 'middle')
<form action="{{ route('contact.store') }}" method="POST" id="contact-form" class="row g-4">
    @csrf
    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
        <div class="form-clt">
            <input type="text" name="name" id="name" placeholder="Your Name*" required>
            <div class="icon"><i class="fal fa-user"></i></div>
        </div>
    </div>
    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".5s">
        <div class="form-clt">
            <input type="email" name="email" id="email" placeholder="Email Address*" required>
            <div class="icon"><i class="fal fa-envelope"></i></div>
        </div>
    </div>
    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".7s">
        <div class="form-clt">
            <textarea name="message" id="message" placeholder="Enter Your Messege here" required></textarea>
            <div class="icon"><i class="fal fa-edit"></i></div>
        </div>
    </div>
    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".8s">
        <button type="submit" class="theme-btn">
            <span><i class="fal fa-paper-plane"></i>Get In Touch</span>
        </button>
    </div>
</form>

@elseif($formType === 'extended')
<form action="{{ route('contact.store') }}" id="contact-form" method="POST" class="mt-4 mt-md-0">
    @csrf
    <div class="row g-3">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
            <div class="form-clt">
                <input type="text" name="name" id="name" placeholder="First Name" required>
            </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
            <div class="form-clt">
                <input type="email" name="email" id="email" placeholder="Email Address" required>
            </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
            <div class="form-clt">
                <input type="text" name="phone" id="phone" placeholder="Phone Number" required>
            </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
            <div class="form-clt">
                <select name="service" class="form-select">
                    <option value="">Choose Services</option>
                    <option value="Default sorting">Default sorting</option>
                    <option value="Sort by popularity">Sort by popularity</option>
                    <option value="Sort by average rating">Sort by average rating</option>
                    <option value="Sort by latest">Sort by latest</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
            <div class="form-clt">
                <textarea name="message" id="message" placeholder="Write Your Message" required></textarea>
            </div>
        </div>
        <div class="col-lg-12 wow fadeInUp" data-wow-delay=".5s">
            <button type="submit" class="theme-btn">
                <span>Send Us Messages <i class="fas fa-chevron-right"></i></span>
            </button>
        </div>
    </div>
</form>
@endif
