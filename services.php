<?php include 'includes/header.php'; ?>

<style>
    /* Liste personnalisée */
    .list-custom {
        list-style: none;
        padding: 0;
    }

    .list-custom li::before {
        content: "-";
        margin-right: 0.5rem;
    }

    .offset-list {
        margin-left: 30px;
        padding-left: 0;
    }

    .offset-list li {
        list-style: inherit;
        margin: 0;
    }

    /* Image dans l'accordion */
    .accordion-body img {
        border-radius: 8px;
        object-fit: cover;
        width: 100%;
        display: block;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    .accordion-body img:hover {
        transform: translateY(-4px);
        box-shadow: 15px 10px 30px rgba(0, 0, 0, 0.25);
    }

    /* Section image */
    .service-image {
        /* Suppression du margin-bottom négatif */
    }
    .text-post-services{
  	text-align: justify;
  }
  .accordion-body img {
            max-height: 500px;
            object-fit: cover;
        }

    /* Fond du bouton d'accordion ouvert */
    .accordion-button:not(.collapsed) {
        background-color: #f5aa5d !important;
        color: #1a3a5f;
        box-shadow: none;
    }

    /* Responsive : hauteur d'image limitée sur mobile */
    @media (max-width: 767.98px) {
        .accordion-body img {
            max-height: 220px;
            object-fit: cover;
        }
      	.text-post-services{
  			text-align: none;
  		}
    }

    /* Espacement général */
    .accordion-body p,
    .accordion-body ul {
        line-height: 1.7;
    }

    /* Espacement après les <br> inutiles */
    .accordion-body ul li br {
        display: none;
    }
    
  

</style>

<div style="font-family: 'Lato', sans-serif;" class="container py-5">
    <h2 class="section-title" style="color: #da6600;">Services</h2>

    <!-- Accordéon Bootstrap -->
    <div class="accordion" id="servicesAccordion">

        <!-- Service 1 : Droit Fiscal -->
        <div class="accordion-item">
            <h3 class="accordion-header" id="headingFiscal">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiscal" aria-expanded="false" aria-controls="collapseFiscal">
                    Droit Fiscal
                </button>
            </h3>
            <div id="collapseFiscal" class="accordion-collapse collapse" aria-labelledby="headingFiscal" data-bs-parent="#servicesAccordion">
                <div class="accordion-body">
                    <div class="row align-items-start">
                        <div class="col-md-4 col-12 service-image mb-3 mb-md-0">
                            <img src="media/photo_palais_5.jpg" alt="Droit Fiscal" class="img-fluid">
                        </div>
                        <div class="col-md-8 col-12">
                          <br>
                            <p>Me Walid Jaafari intervient dans toutes les matières du droit fiscal, avec une expertise particulière en fiscalité des personnes physiques et des sociétés. Son activité couvre notamment :</p>
                            <ul class="list-custom offset-list">
                                <li>la fiscalité des particuliers : revenus mobiliers et immobiliers, transparence fiscale, comptes à l’étranger, placements financiers, plus-values internes ;</li>
                                <li>l’impôt des sociétés et la fiscalité des dirigeants : structuration, rémunération, réorganisations, opérations de M&A, accompagnement stratégique ;</li>
                                <li>la fiscalité internationale : établissements stables, problématiques de substance, double imposition, mobilité des contribuables, régularisations et rapatriements de fonds ;</li>
                                <li>la fiscalité indirecte : TVA, droits d’enregistrement, droits de succession, taxes régionales et locales, ainsi que les douanes et accises ;</li>
                                <li>la compliance et la loi préventive anti-blanchiment (BC/FT) : accompagnement des entités assujetties et des contribuables dans leurs obligations déclaratives ;</li>
                                <li>les contrôles fiscaux : assistance à tous les stades du contrôle, gestion des relations avec l’administration ;</li>
                                <li>contentieux administratif et judiciaire : rédaction de recours et défense devant les juridictions fiscales et pénales ;</li>
                                <li>les demandes de ruling, la planification et la sécurisation d’opérations sensibles.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service 2 : Droit Patrimonial -->
        <div class="accordion-item">
            <h3 class="accordion-header" id="headingPatrimonial">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePatrimonial" aria-expanded="false" aria-controls="collapsePatrimonial">
                    Droit Patrimonial
                </button>
            </h3>
            <div id="collapsePatrimonial" class="accordion-collapse collapse" aria-labelledby="headingPatrimonial" data-bs-parent="#servicesAccordion">
                <div class="accordion-body">
                    <div class="row align-items-start">
                        <div class="col-md-4 col-12 service-image mb-3 mb-md-0">
                            <img src="media/photo_palais_1.jpg" alt="Droit Patrimonial" class="img-fluid">
                        </div>
                        <div class="col-md-8 col-12">
                          <br>
                            <p>Me Walid Jaafari aide à organiser et protéger votre patrimoine, en tenant compte à la fois des aspects civils et fiscaux :</p>
                            <ul class="list-custom offset-list">
                                <li>planification successorale : préparer la transmission de vos biens pour protéger vos proches et optimiser la fiscalité ;</li>
                                <li>transmission d’entreprise familiale : accompagner la reprise et la gouvernance pour assurer la pérennité ;</li>
                                <li>création de structures patrimoniales : sociétés, holdings, fondations privées pour gérer efficacement vos biens ;</li>
                                <li>démembrement de propriété : répartir l’usage et la propriété (usufruit, nue-propriété) pour mieux protéger et transmettre ;</li>
                                <li>instruments juridiques : rédaction de donations, testaments, contrats de mariage ou de vie commune, et pactes successoraux.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service 3 : Droit Pénal -->
        <div class="accordion-item">
            <h3 class="accordion-header" id="headingPenal">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePenal" aria-expanded="false" aria-controls="collapsePenal">
                    Droit Pénal
                </button>
            </h3>
            <div id="collapsePenal" class="accordion-collapse collapse" aria-labelledby="headingPenal" data-bs-parent="#servicesAccordion">
                <div class="accordion-body">
                    <div class="row align-items-start">
                        <div class="col-md-4 col-12 service-image mb-3 mb-md-0">
                            <img src="media/photo_palais_2.jpg" alt="Droit Pénal" class="img-fluid">
                        </div>
                        <div class="col-md-8 col-12">
                            <ul class="list-custom">
                              <br>
                                <li>Criminalité financière</li>
                                <p>Me Walid Jaafari conseille et défend les sociétés ainsi que leurs dirigeants confrontés à des risques pénaux.<br><br>
                                    Il intervient à chaque étape de la procédure, depuis les enquêtes jusqu’aux audiences, notamment en matière de fraude fiscale, abus de biens sociaux, blanchiment d’argent, corruption et, plus largement, toutes les infractions liées à la criminalité financière.</p>
                                <li>Roulage</li>
                                <p>Me Walid Jaafari défend les conducteurs confrontés à des infractions au Code de la route.<br><br> 
                                    Il intervient lors de procédures liées à des excès de vitesse, conduite sous influence, délit de fuite, défaut d’assurance, ou encore retrait de permis.
                                </p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service 4 : Droit des Étrangers -->
        <div class="accordion-item">
            <h3 class="accordion-header" id="headingEtrangers">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEtrangers" aria-expanded="false" aria-controls="collapseEtrangers">
                    Droit des Étrangers
                </button>
            </h3>
            <div id="collapseEtrangers" class="accordion-collapse collapse" aria-labelledby="headingEtrangers" data-bs-parent="#servicesAccordion">
                <div class="accordion-body">
                    <div class="row align-items-start">
                        <div class="col-md-4 col-12 service-image mb-3 mb-md-0">
                            <img src="media/photo_palais_4.jpg" alt="Droit des Étrangers" class="img-fluid">
                        </div>
                        <div class="col-md-8 col-12">
                          <br>
                            <p>Me Walid Jaafari accompagne les particuliers dans leurs démarches d’immigration en Belgique.<br><br> 
                                Il intervient dans les procédures de régularisation de séjour, de regroupement familial, de demande de nationalité belge, ainsi que dans les contentieux liés à l’immigration.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 1.5rem;">
        <p class="text-post-services">Chaque dossier est traité avec rigueur, confidentialité et une approche personnalisée.
            JAAFARI Legal & Tax s’appuie sur la législation et la jurisprudence les plus récentes afin d’assurer la sécurité juridique de chaque opération. L’anticipation est la clé d’une stratégie réussie.</p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>