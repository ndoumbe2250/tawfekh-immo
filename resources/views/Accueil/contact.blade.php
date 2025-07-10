   <section class="py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-4 fw-bold text-primary">Contactez-Nous</h2>
                    <p class="lead">Notre équipe est à votre disposition</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form action="{{ route('contacts.store') }}" method="POST" id="contactForm" class="contact-form" enctype="multipart/form-data">
                      @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Nom complet" >
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-6">
                                <input type="tel" class="form-control" name="phone" placeholder="Téléphone">
                            </div>
                            <div class="col-md-6">
                                <select class="form-select" name="type_demande">
                                    <option>Type de demande</option>
                                    <option value="vente">Vente</option>
                                    <option value="achat">Achat</option>
                                    <option value="location">Location</option>
                                    <option value="estimation">Estimation</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" rows="5" name="message" placeholder="Votre message..."></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="fas fa-paper-plane me-2" ></i>Envoyer le message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    

    </section>