@extends('layouts.web')
@section('content')

    <!-- Page Header Start -->
	<div class="page-header bg-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">Contact <span>us</span></h1>
                        <nav class="wow fadeInUp" data-wow-delay="0.25s">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">contact us</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>	
	</div>
	<!-- Page Header End -->

    <!-- Page Contact Us Start -->
    <div class="page-contact-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Contact Us Content Start -->
                    <div class="contact-us-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3>contact us</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Let's start a <span>conversation</span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Contact Info List Start -->
                        <div class="contact-info-list">
                            <!-- Contact Info Item Start -->
                            <div class="contact-info-item wow fadeInUp">
                                <div class="icon-box">
                                    <img src="images/icon-phone.svg" alt="">
                                </div>
                                <div class="contact-info-content">
                                    <h3>phone number</h3>
                                    <p>+91 80579 11777</p>
                                </div>
                            </div>
                            <!-- Contact Info Item End -->
                            
                            <!-- Contact Info Item Start -->
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.25s">
                                <div class="icon-box">
                                    <img src="images/icon-mail.svg" alt="">
                                </div>
                                <div class="contact-info-content">
                                    <h3>email us</h3>
                                    <p>Hello@vienhancestudio.com</p>
                                </div>
                            </div>
                            <!-- Contact Info Item End -->

                            <!-- Contact Info Item Start -->
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.5s">
                                <div class="icon-box">
                                    <img src="images/icon-location.svg" alt="">
                                </div>
                                <div class="contact-info-content">
                                    <h3>address</h3>
                                    <p>Roorkee, Uttrakhand, India - 247667</p>
                                </div>
                            </div>
                            <!-- Contact Info Item End -->
                        </div>
                        <!-- Contact Info List End -->
                    </div>
                    <!-- Contact Us Content End -->
                </div>

                <div class="col-lg-6">
                    <!-- Contact Us Form Start -->
                    <div class="contact-us-form">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Get a <span>free advise</span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Contact Form Start -->
                        <div class="contact-form">
                            <form id="contactForm" action="#" method="POST" class="wow fadeInUp" data-wow-delay="0.25s" novalidate>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <label class="form-label">first name</label>
                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" data-required="true">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <label class="form-label">last name</label>
                                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" data-required="true">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <label class="form-label">email address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" data-required="true">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <label class="form-label">mobile number</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Mobile Number (e.g., 9876543210)" data-required="true">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-12 mb-5">
                                        <label class="form-label">your message</label>
                                        <textarea name="message" class="form-control" id="message" rows="4" placeholder="Subject"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn-default">send message</button>
                                        <div id="msgSubmit" class="h3 hidden"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Contact Form Start -->
                    </div>
                    <!-- Contact Us Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->

    <!-- Google Map Section Start -->
    <div class="google-map">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Google Map IFrame Start -->
                    <div class="google-map-iframe">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55361.57352820278!2d77.85362606329214!3d29.86143749089353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390eb36e08b35119%3A0x798f5dc25ebd0a72!2sRoorkee%2C%20Uttarakhand!5e0!3m2!1sen!2sin!4v1755438893274!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- Google Map IFrame End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map Section End -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const phoneInput = document.getElementById('phone');
            
            // Function to validate phone number
            function validatePhone(phone) {
                const phonePattern = /^[6-9]\d{9}$/;
                return phonePattern.test(phone);
            }
            
            // Function to show/hide error message
            function toggleError(input, isValid, message) {
                const errorDiv = input.parentNode.querySelector('.help-block');
                if (!isValid && input.value.trim() !== '') {
                    errorDiv.textContent = message;
                    errorDiv.style.display = 'block';
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                } else if (isValid && input.value.trim() !== '') {
                    errorDiv.textContent = '';
                    errorDiv.style.display = 'none';
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                } else {
                    errorDiv.textContent = '';
                    errorDiv.style.display = 'none';
                    input.classList.remove('is-invalid', 'is-valid');
                }
            }
            
            // Track if user has interacted with the phone field
            let phoneFieldTouched = false;
            
            // Phone validation on blur (when user leaves the field)
            phoneInput.addEventListener('blur', function() {
                phoneFieldTouched = true;
                const isValid = validatePhone(this.value.trim());
                toggleError(this, isValid, 'Please enter a valid 10-digit mobile number starting with 6, 7, 8, or 9');
            });
            
            // Phone validation on input (real-time validation)
            phoneInput.addEventListener('input', function() {
                if (!phoneFieldTouched) return; // Don't validate until user has interacted
                
                if (this.value.trim() !== '') {
                    const isValid = validatePhone(this.value.trim());
                    toggleError(this, isValid, 'Please enter a valid 10-digit mobile number starting with 6, 7, 8, or 9');
                } else {
                    toggleError(this, true, '');
                }
            });
            
            // Track if user has interacted with form fields
            let fieldsTouched = {
                fname: false,
                lname: false,
                email: false,
                phone: false
            };
            
            // Add focus event listeners to track when fields are touched
            document.getElementById('fname').addEventListener('focus', function() { fieldsTouched.fname = true; });
            document.getElementById('lname').addEventListener('focus', function() { fieldsTouched.lname = true; });
            document.getElementById('email').addEventListener('focus', function() { fieldsTouched.email = true; });
            phoneInput.addEventListener('focus', function() { fieldsTouched.phone = true; });
            
            // Form submission validation
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                let isValid = true;
                
                // Validate required fields
                const requiredFields = form.querySelectorAll('[data-required="true"]');
                requiredFields.forEach(function(field) {
                    const fieldName = field.name;
                    const hasBeenTouched = fieldsTouched[fieldName];
                    
                    if (field.value.trim() === '') {
                        const errorDiv = field.parentNode.querySelector('.help-block');
                        errorDiv.textContent = 'This field is required';
                        errorDiv.style.display = 'block';
                        field.classList.add('is-invalid');
                        field.classList.remove('is-valid');
                        isValid = false;
                    } else if (hasBeenTouched) {
                        // Only show valid state if field has been touched
                        const errorDiv = field.parentNode.querySelector('.help-block');
                        errorDiv.textContent = '';
                        errorDiv.style.display = 'none';
                        field.classList.remove('is-invalid');
                        field.classList.add('is-valid');
                    }
                });
                
                // Validate email format
                const emailInput = document.getElementById('email');
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailInput.value.trim() !== '' && !emailPattern.test(emailInput.value.trim())) {
                    const errorDiv = emailInput.parentNode.querySelector('.help-block');
                    errorDiv.textContent = 'Please enter a valid email address';
                    errorDiv.style.display = 'block';
                    emailInput.classList.add('is-invalid');
                    emailInput.classList.remove('is-valid');
                    isValid = false;
                } else if (emailInput.value.trim() !== '' && emailPattern.test(emailInput.value.trim()) && fieldsTouched.email) {
                    const errorDiv = emailInput.parentNode.querySelector('.help-block');
                    errorDiv.textContent = '';
                    errorDiv.style.display = 'none';
                    emailInput.classList.remove('is-invalid');
                    emailInput.classList.add('is-valid');
                }
                
                // Validate phone number
                if (phoneInput.value.trim() !== '' && !validatePhone(phoneInput.value.trim())) {
                    const errorDiv = phoneInput.parentNode.querySelector('.help-block');
                    errorDiv.textContent = 'Please enter a valid 10-digit mobile number starting with 6, 7, 8, or 9';
                    errorDiv.style.display = 'block';
                    phoneInput.classList.add('is-invalid');
                    phoneInput.classList.remove('is-valid');
                    isValid = false;
                } else if (phoneInput.value.trim() !== '' && validatePhone(phoneInput.value.trim()) && fieldsTouched.phone) {
                    const errorDiv = phoneInput.parentNode.querySelector('.help-block');
                    errorDiv.textContent = '';
                    errorDiv.style.display = 'none';
                    phoneInput.classList.remove('is-invalid');
                    phoneInput.classList.add('is-valid');
                }
                
                if (isValid) {
                    // Form is valid, you can submit it here
                    console.log('Form is valid, ready to submit');
                    // Uncomment the line below to actually submit the form
                    // form.submit();
                }
            });
        });
    </script>

@endsection
