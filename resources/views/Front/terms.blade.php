@extends('Front.parent')

@section('title', 'Terms and Conditions')

@section('content')
    <!-- Terms and Conditions Section -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-6 mb-4">Terms and Conditions</h1>
                <p class="text-muted">Please read these terms and conditions carefully before using our website.</p>
            </div>

            <!-- Terms Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <h2 class="mb-4">1. Introduction</h2>
                        <p>
                            These terms and conditions govern your use of our website; by using our website, you accept these terms and conditions in full. If you disagree with any part of these terms and conditions, you must not use our website.
                        </p>

                        <h2 class="mb-4">2. Intellectual Property Rights</h2>
                        <p>
                            Unless otherwise stated, we or our licensors own the intellectual property rights in the website and material on the website. Subject to the license below, all these intellectual property rights are reserved.
                        </p>

                        <h2 class="mb-4">3. License to Use Website</h2>
                        <p>
                            You may view, download for caching purposes only, and print pages from the website for your own personal use, subject to the restrictions set out below and elsewhere in these terms and conditions.
                        </p>

                        <h2 class="mb-4">4. Acceptable Use</h2>
                        <p>
                            You must not use our website in any way that causes, or may cause, damage to the website or impairment of the availability or accessibility of the website. You must not use our website in any way that is unlawful, illegal, fraudulent, or harmful.
                        </p>

                        <h2 class="mb-4">5. Limitations of Liability</h2>
                        <p>
                            We will not be liable to you (whether under the law of contact, the law of torts, or otherwise) in relation to the contents of, or use of, or otherwise in connection with, our website.
                        </p>

                        <h2 class="mb-4">6. Changes to These Terms</h2>
                        <p>
                            We may revise these terms and conditions from time to time. The revised terms and conditions will apply to the use of our website from the date of publication of the revised terms and conditions on our website.
                        </p>

                        <h2 class="mb-4">7. Contact Information</h2>
                        <p>
                            If you have any questions about these terms and conditions, please contact us via email at info@uplancerps.com.
                        </p>

                        <div class="text-center mt-4">
                            <a href="{{route('home')}}" class="btn btn-primary rounded-pill py-3 px-5">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Terms and Conditions Section -->
@endsection
