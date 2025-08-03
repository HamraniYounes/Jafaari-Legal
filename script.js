function showSection(sectionId) {
            // Hide all sections
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.classList.remove('active');
            });
            
            // Show selected section
            document.getElementById(sectionId).classList.add('active');
            
            // Update navigation
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.classList.remove('active');
            });
            
            // Add active class to clicked link
            if (event && event.target) {
                event.target.classList.add('active');
            }
            
            // Smooth scroll to top
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Translations object
        const translations = {
            fr: {
                'nav-home': 'Accueil',
                'nav-about': 'À propos',
                'nav-services': 'Services',
                'nav-news': 'Actualités',
                'nav-contact': 'Contact',
                'hero-title': 'Excellence Juridique',
                'hero-text': 'Nous offrons des services juridiques de haute qualité avec une approche personnalisée et un engagement sans faille envers nos clients.',
                'cta-button': 'Nous Contacter',
                'about-title': 'À Propos',
                'about-text1': 'Notre cabinet d\'avocats offre un environnement de type boutique qui met l\'accent sur les caractéristiques uniques de chaque client et de chaque dossier.',
                'about-text2': 'Avec des années d\'expérience dans différents domaines du droit, notre équipe combine expertise technique et approche humaine pour offrir un service juridique d\'exception.',
                'expertise-title': 'Expertise',
                'expertise-text': 'Notre équipe est constituée de professionnels du droit ayant un profil académique de premier ordre, combinant souvent leur travail avec des missions universitaires.',
                'dedication-title': 'Dévouement',
                'dedication-text': 'Nous apprécions la motivation et le dévouement lorsqu\'il s\'agit de comprendre et de défendre nos clients et leurs intérêts. Nous visons l\'excellence.',
                'personalization-title': 'Personnalisation',
                'personalization-text': 'Nous ne voulons pas être le plus grand cabinet, mais nous essayons toujours d\'être le meilleur pour nos clients, dans un environnement personnalisé.',
                'services-title': 'Nos Services',
                'business-law': 'Droit des Affaires',
                'business-law-text': 'Conseil et accompagnement juridique pour les entreprises, contrats commerciaux, fusions-acquisitions, et structuration d\'entreprises.',
                'labor-law': 'Droit du Travail',
                'labor-law-text': 'Assistance en matière de relations de travail, négociation collective, licenciements et contentieux prud\'hommal.',
                'real-estate-law': 'Droit Immobilier',
                'real-estate-law-text': 'Transactions immobilières, baux commerciaux, copropriété, et résolution de litiges immobiliers.',
                'family-law': 'Droit de la Famille',
                'family-law-text': 'Divorce, garde d\'enfants, adoption, successions et tous les aspects du droit familial.',
                'criminal-law': 'Droit Pénal',
                'criminal-law-text': 'Défense pénale, assistance lors des gardes à vue, et représentation devant les tribunaux correctionnels.',
                'civil-law': 'Droit Civil',
                'civil-law-text': 'Responsabilité civile, dommages et intérêts, et tous types de contentieux civils.',
                'news-title': 'Actualités',
                'our-articles': 'Nos Articles',
                'article-date1': '15 juin 2024',
                'article-title1': 'Nouvelles réglementations en droit du travail',
                'article-excerpt1': 'Les récentes modifications du Code du travail impactent significativement les relations employeur-employé. Découvrez les principales évolutions et leurs implications pratiques...',
                'article-date2': '8 juin 2024',
                'article-title2': 'Protection des données personnelles : ce qui change',
                'article-excerpt2': 'Le RGPD continue d\'évoluer avec de nouvelles directives. Nous faisons le point sur les obligations des entreprises et les sanctions encourues...',
                'article-date3': '2 juin 2024',
                'article-title3': 'Réforme du droit des successions',
                'article-excerpt3': 'La récente réforme apporte des changements importants dans la transmission du patrimoine. Analyse des nouvelles dispositions et conseils pratiques...',
                'read-more': 'Lire la suite →',
                'our-videos': 'Nos Vidéos YouTube',
                'video-title1': 'Comment rédiger un contrat de travail ?',
                'video-title2': 'Les bases du droit immobilier',
                'video-title3': 'Divorce : vos droits et obligations',
                'video-title4': 'Créer son entreprise : aspects juridiques',
                'video-title5': 'Protection des consommateurs',
                'watch-youtube': 'Voir sur YouTube →',
                'contact-title': 'Contact',
                'my-coordinates': 'Mes Coordonnées',
                'address-label': 'Adresse :',
                'phone-label': 'Téléphone :',
                'email-label': 'Email :',
                'hours-label': 'Horaires :',
                'weekdays': 'Lun-Ven : 9h00 - 18h00',
                'saturday': 'Sam : 9h00 - 12h00',
                'contact-me': 'Me Contacter',
                'full-name': 'Nom complet',
                'email-input': 'Email',
                'phone-input': 'Téléphone',
                'subject': 'Objet',
                'message': 'Message',
                'send-message': 'Envoyer le message',
                'footer': '© 2025 Jafaari Legal & Tax. Tous droits réservés.',
                'form-success': 'Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.'
            },
            en: {
                'nav-home': 'Home',
                'nav-about': 'About',
                'nav-services': 'Services',
                'nav-news': 'News',
                'nav-contact': 'Contact',
                'hero-title': 'Legal Excellence',
                'hero-text': 'We offer high-quality legal services with a personalized approach and unwavering commitment to our clients.',
                'cta-button': 'Contact Us',
                'about-title': 'About Us',
                'about-text1': 'Our law firm offers a boutique-style environment that focuses on the unique characteristics of each client and case.',
                'about-text2': 'With years of experience in various areas of law, our team combines technical expertise and a human-centered approach to deliver exceptional legal services.',
                'expertise-title': 'Expertise',
                'expertise-text': 'Our team consists of legal professionals with first-class academic profiles, often combining their work with university missions.',
                'dedication-title': 'Dedication',
                'dedication-text': 'We appreciate motivation and dedication when it comes to understanding and defending our clients and their interests. We aim for excellence.',
                'personalization-title': 'Personalization',
                'personalization-text': 'We don\'t want to be the biggest firm, but we always try to be the best for our clients, in a personalized environment.',
                'services-title': 'Our Services',
                'business-law': 'Business Law',
                'business-law-text': 'Legal counsel and support for businesses, commercial contracts, mergers and acquisitions, and corporate structuring.',
                'labor-law': 'Employment Law',
                'labor-law-text': 'Assistance in employment relations, collective bargaining, dismissals and employment disputes.',
                'real-estate-law': 'Real Estate Law',
                'real-estate-law-text': 'Real estate transactions, commercial leases, condominium law, and real estate dispute resolution.',
                'family-law': 'Family Law',
                'family-law-text': 'Divorce, child custody, adoption, inheritance and all aspects of family law.',
                'criminal-law': 'Criminal Law',
                'criminal-law-text': 'Criminal defense, assistance during police custody, and representation before criminal courts.',
                'civil-law': 'Civil Law',
                'civil-law-text': 'Civil liability, damages, and all types of civil litigation.',
                'news-title': 'News',
                'our-articles': 'Our Articles',
                'article-date1': 'June 15, 2024',
                'article-title1': 'New employment law regulations',
                'article-excerpt1': 'Recent amendments to the Employment Code significantly impact employer-employee relations. Discover the main developments and their practical implications...',
                'article-date2': 'June 8, 2024',
                'article-title2': 'Personal data protection: what\'s changing',
                'article-excerpt2': 'GDPR continues to evolve with new directives. We review companies\' obligations and penalties incurred...',
                'article-date3': 'June 2, 2024',
                'article-title3': 'Inheritance law reform',
                'article-excerpt3': 'The recent reform brings important changes in wealth transmission. Analysis of new provisions and practical advice...',
                'read-more': 'Read more →',
                'our-videos': 'Our YouTube Videos',
                'video-title1': 'How to draft an employment contract?',
                'video-title2': 'Real estate law basics',
                'video-title3': 'Divorce: your rights and obligations',
                'video-title4': 'Starting a business: legal aspects',
                'video-title5': 'Consumer protection',
                'watch-youtube': 'Watch on YouTube →',
                'contact-title': 'Contact',
                'my-coordinates': 'My Contact Details',
                'address-label': 'Address:',
                'phone-label': 'Phone:',
                'email-label': 'Email:',
                'hours-label': 'Opening Hours:',
                'weekdays': 'Mon-Fri: 9:00 AM - 6:00 PM',
                'saturday': 'Sat: 9:00 AM - 12:00 PM',
                'contact-me': 'Contact Me',
                'full-name': 'Full Name',
                'email-input': 'Email',
                'phone-input': 'Phone',
                'subject': 'Subject',
                'message': 'Message',
                'send-message': 'Send Message',
                'footer': '© 2025 Jafaari Legal & Tax. All rights reserved.',
                'form-success': 'Thank you for your message! We will respond to you as soon as possible.'
            },
            nl: {
                'nav-home': 'Home',
                'nav-about': 'Over Ons',
                'nav-services': 'Diensten',
                'nav-news': 'Nieuws',
                'nav-contact': 'Contact',
                'hero-title': 'Juridische Excellentie',
                'hero-text': 'Wij bieden kwalitatief hoogwaardige juridische diensten met een persoonlijke aanpak en onwankelbare toewijding aan onze cliënten.',
                'cta-button': 'Contacteer Ons',
                'about-title': 'Over Ons',
                'about-text1': 'Ons advocatenkantoor biedt een boutique-omgeving die zich richt op de unieke kenmerken van elke cliënt en elk dossier.',
                'about-text2': 'Met jarenlange ervaring in verschillende rechtsgebieden combineert ons team technische expertise met een mensgerichte aanpak om uitzonderlijke juridische diensten te leveren.',
                'expertise-title': 'Expertise',
                'expertise-text': 'Ons team bestaat uit juridische professionals met eersteklas academische profielen, die hun werk vaak combineren met universitaire missies.',
                'dedication-title': 'Toewijding',
                'dedication-text': 'Wij waarderen motivatie en toewijding als het gaat om het begrijpen en verdedigen van onze cliënten en hun belangen. Wij streven naar excellentie.',
                'personalization-title': 'Personalisatie',
                'personalization-text': 'Wij willen niet het grootste kantoor zijn, maar proberen altijd het beste te zijn voor onze cliënten, in een gepersonaliseerde omgeving.',
                'services-title': 'Onze Diensten',
                'business-law': 'Ondernemingsrecht',
                'business-law-text': 'Juridisch advies en ondersteuning voor bedrijven, commerciële contracten, fusies en overnames, en bedrijfsstructurering.',
                'labor-law': 'Arbeidsrecht',
                'labor-law-text': 'Bijstand bij arbeidsverhoudingen, collectieve onderhandelingen, ontslagen en arbeidsgeschillen.',
                'real-estate-law': 'Vastgoedrecht',
                'real-estate-law-text': 'Vastgoedtransacties, commerciële huurcontracten, appartementsrecht en vastgoedgeschillenbeslechting.',
                'family-law': 'Familierecht',
                'family-law-text': 'Echtscheiding, voogdij, adoptie, erfenissen en alle aspecten van het familierecht.',
                'criminal-law': 'Strafrecht',
                'criminal-law-text': 'Strafrechtelijke verdediging, bijstand tijdens politiehechtenis en vertegenwoordiging voor strafrechters.',
                'civil-law': 'Burgerlijk Recht',
                'civil-law-text': 'Burgerlijke aansprakelijkheid, schadevergoeding en alle soorten civiele geschillen.',
                'news-title': 'Nieuws',
                'our-articles': 'Onze Artikelen',
                'article-date1': '15 juni 2024',
                'article-title1': 'Nieuwe arbeidsrechtregelgeving',
                'article-excerpt1': 'Recente wijzigingen in het Arbeidsrecht hebben aanzienlijke gevolgen voor werkgever-werknemerrelaties. Ontdek de belangrijkste ontwikkelingen en hun praktische implicaties...',
                'article-date2': '8 juni 2024',
                'article-title2': 'Bescherming van persoonsgegevens: wat er verandert',
                'article-excerpt2': 'AVG blijft evolueren met nieuwe richtlijnen. Wij bekijken de verplichtingen van bedrijven en de opgelegde sancties...',
                'article-date3': '2 juni 2024',
                'article-title3': 'Hervorming van het erfrecht',
                'article-excerpt3': 'De recente hervorming brengt belangrijke veranderingen in vermogensoverdracht. Analyse van nieuwe bepalingen en praktisch advies...',
                'read-more': 'Lees meer →',
                'our-videos': 'Onze YouTube Video\'s',
                'video-title1': 'Hoe schrijf je een arbeidscontract?',
                'video-title2': 'Basis van vastgoedrecht',
                'video-title3': 'Echtscheiding: uw rechten en verplichtingen',
                'video-title4': 'Een bedrijf starten: juridische aspecten',
                'video-title5': 'Consumentenbescherming',
                'watch-youtube': 'Bekijk op YouTube →',
                'contact-title': 'Contact',
                'my-coordinates': 'Mijn Contactgegevens',
                'address-label': 'Adres:',
                'phone-label': 'Telefoon:',
                'email-label': 'E-mail:',
                'hours-label': 'Openingstijden:',
                'weekdays': 'Ma-Vr: 9:00 - 18:00',
                'saturday': 'Za: 9:00 - 12:00',
                'contact-me': 'Contacteer Mij',
                'full-name': 'Volledige Naam',
                'email-input': 'E-mail',
                'phone-input': 'Telefoon',
                'subject': 'Onderwerp',
                'message': 'Bericht',
                'send-message': 'Bericht Verzenden',
                'footer': '© 2025 Jafaari Legal & Tax. Alle rechten voorbehouden.',
                'form-success': 'Bedankt voor uw bericht! We zullen zo snel mogelijk antwoorden.'
            }
        };

        function changeLanguage(lang) {
            // Get translations for the selected language
            const t = translations[lang];
            
            // Update all elements with data-translate attributes
            document.querySelectorAll('[data-translate]').forEach(element => {
                const key = element.getAttribute('data-translate');
                if (t[key]) {
                    element.textContent = t[key];
                }
            });
        }

        // Form submission handling
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const lang = document.getElementById('languageSelector').value;
                    const t = translations[lang];
                    alert(t['form-success']);
                    this.reset();
                });
            }

            // Add animation to cards on scroll
            const cards = document.querySelectorAll('.service-card, .article-card, .value-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            });
            
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });

            // Initialize with French by default
            changeLanguage('fr');
        });