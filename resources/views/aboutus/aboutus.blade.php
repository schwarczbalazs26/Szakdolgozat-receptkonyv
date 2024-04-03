<x-app-layout class="mb-6">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <section class="about-section chocolate">
                <div class="about-content">
                    <div class="flex-container">
                        <div class="text">
                            <h2>Welcome to 1001 Recipes</h2>
                            <p>Your ultimate destination for culinary inspiration and gastronomic delights! Here at 1001 Recipes, we're on a mission to ignite your passion for cooking and elevate your culinary skills to new heights.</p>
                        </div>
                        <div class="image">
                            <img src="https://placehold.co/550x400" alt="Placeholder Image">
                        </div>
                    </div>
                </div>
            </section>
            <section class="about-section charcoal">
                <div class="about-content">
                    <div class="flex-container">
                        <div class="text">
                            <h2>Our Culinary Community</h2>
                            <p>1001 Recipes is more than just a recipe website – it's a thriving community of food enthusiasts united by a shared love for all things delicious. Join our community, share your culinary triumphs, and connect with like-minded individuals from around the world.</p>
                        </div>
                        <div class="image">
                            <img src="https://placehold.co/550x400" alt="Placeholder Image">
                        </div>
                    </div>
                </div>
            </section>
            <section class="about-section slate">
                <div class="about-content">
                    <div class="flex-container">
                        <div class="text">
                            <h2>Discover the Joy of Cooking</h2>
                            <p>Whether you're looking for quick and easy weeknight dinners, indulgent desserts, or impressive dishes to wow your guests, 1001 Recipes has got you covered. Join us as we explore the endless possibilities of the culinary world and discover the joy of cooking, one recipe at a time.</p>
                        </div>
                        <div class="image">
                            <img src="https://placehold.co/550x400" alt="Placeholder Image">
                        </div>
                    </div>
                </div>
            </section>
            <section class="about-section brown-black">
                <div class="about-content">
                    <div class="flex-container">
                        <div class="text">
                            <h2>Have any questions or suggestions?</h2>
                            <p>Feel free to contact us!</p>
                        </div>
                        <div class="image form-container">
                            <form id="contactForm" action="/send-email" method="POST">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" placeholder="Type your message here..." rows="6"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" id="email" placeholder="Your email...">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>

<link rel="stylesheet" href="{{ asset('css/aboutusstyle.css') }}">
