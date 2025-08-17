<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceDescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicesData = [
            [
                'title' => 'UI/UX & Digital Experience Design',
                'slug' => 'ui-ux-digital-experience-design',
                'description' => 'Developing seamless, intuitive digital experiences that engage and convert.',
                'image' => 'images/service-image-1.jpg',
                'link' => '/services/ui-ux-digital-experience-design',
                'delay' => '0s',
                'sort_order' => 1,
                'description_data' => [
                    'section_1' => 'At Vienhance Studio, we design intuitive, interactive, and visually appealing digital experiences that are both functional and beautiful. Our UI/UX design process is centered on simplicity, usability, and intuitive navigation—making sure that every product we build increases user satisfaction. Whether it\'s a website, mobile application, or digital platform, we design experiences that not only look beautiful but are also easy to use.',
                    'section_2' => 'We think good design is more than looks—it\'s how people experience your product. That\'s why we make sure every interface is accessible, user-friendly, and purposefully planned to achieve business objectives while meeting users where they are.',
                    'section_3' => 'The design process is an organized method of solution creation that incorporates research, creativity, and iterative development to provide functional and effective outcomes. Our systematic step-by-step process guarantees that each product we create is well-designed, user-centric, and aligns with business objectives.',
                    'benefits' => [
                        'Enhanced User Satisfaction',
                        'Higher Conversion Rates',
                        'Improved Brand Loyalty',
                        'Reduced Development Costs',
                        'Increased User Retention',
                        'Accessible & Inclusive Designs'
                    ],
                    'process' => [
                        [
                            'title' => 'Research & Strategy',
                            'description' => 'We start by learning about user requirements, business objectives, and market trends to develop a design strategy that is in sync with your vision.',
                            'icon' => 'images/icon-design-process-1.svg'
                        ],
                        [
                            'title' => 'Wireframing & Prototyping',
                            'description' => 'We make wireframes and interactive prototypes to plan out the user experience, providing a smooth ride before final development.',
                            'icon' => 'images/icon-design-process-2.svg'
                        ],
                        [
                            'title' => 'Design & Testing',
                            'description' => 'Our experts create a beautifully designed, fully functional design and then conduct vigorous usability testing to optimize and complete the user experience.',
                            'icon' => 'images/icon-design-process-3.svg'
                        ]
                    ],
                    'faqs' => [
                        [
                            'question' => 'Why is user research important in UI/UX projects?',
                            'answer' => 'User research is fundamental as it provides insights into your target audience\'s needs, behaviors, and pain points. This data informs our design decisions, ensuring the final product genuinely solves user problems and meets their expectations, leading to higher engagement and satisfaction.'
                        ],
                        [
                            'question' => 'How do you ensure the design is user-friendly and intuitive?',
                            'answer' => 'We achieve user-friendliness through a human-centric approach, starting with user research, creating clear information architecture, and rigorous usability testing. We focus on natural navigation flows, accessible design principles, and consistent visual patterns that users find familiar and easy to understand.'
                        ],
                        [
                            'question' => 'Can you redesign an existing digital product or website?',
                            'answer' => 'Absolutely. We specialize in redesigning and optimizing existing digital products. Our process involves auditing the current experience, identifying pain points, and then strategically redesigning elements to improve usability, aesthetics, and overall performance, ultimately enhancing your ROI.'
                        ],
                        [
                            'question' => 'How do you incorporate accessibility into your UI/UX designs?',
                            'answer' => 'Accessibility is a core consideration from the outset of every project. We adhere to WCAG (Web Content Accessibility Guidelines) best practices, focusing on elements like color contrast, scalable typography, keyboard usability, and proper alt-text for images to ensure your digital experiences are usable and enjoyable for everyone, including those with disabilities.'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Branding & Identity Design',
                'slug' => 'branding-identity-design',
                'description' => 'Developing bold, memorable brand identities that leave a lasting impression.',
                'image' => 'images/service-image-2.jpg',
                'link' => '/services/branding-identity-design',
                'delay' => '0.2s',
                'sort_order' => 2,
                'description_data' => [
                    'section_1' => 'A brand is more than just a logo—it\'s the embodiment of a company\'s personality, promise, and narrative. We assist companies in creating a unique and identifiable brand identity by developing engaging logos, consistent visual languages, and narrative brand stories. Our method achieves consistency in every touch point, enabling companies to gain trust and leave an enduring impression.',
                    'section_2' => 'A strong brand identity is crucial for recognition, trust, and market positioning, ensuring long-term success. It transforms your brand into a deeply connecting experience, captivating audiences and driving sustained business growth.',
                    'section_3' => 'Branding is not all about looks—it\'s about building a strategic foundation that honors your company\'s values and speaks to your audience. Our process ensures each piece of your brand identity is intentional, effective, and geared towards your business objectives.',
                    'benefits' => [
                        'Stronger Brand Recognition',
                        'Builds Trust & Credibility',
                        'Consistent Brand Messaging',
                        'Increases Customer Loyalty',
                        'Increases Market Differentiation',
                        'Enhances Business Development'
                    ],
                    'process' => [
                        [
                            'title' => 'Discovery & Strategy',
                            'description' => 'We delve deep into your business, audience, and industry to define your brand\'s core values, unique positioning, and distinct voice.',
                            'icon' => 'images/icon-design-process-1.svg'
                        ],
                        [
                            'title' => 'Design & Development',
                            'description' => 'From strategic insights, we craft distinctive logos, harmonious typography, compelling color palettes, and comprehensive brand elements.',
                            'icon' => 'images/icon-design-process-2.svg'
                        ],
                        [
                            'title' => 'Implementation & Consistency',
                            'description' => 'We create detailed brand guidelines and essential assets, ensuring your new identity is seamlessly integrated and consistent across all platforms.',
                            'icon' => 'images/icon-design-process-3.svg'
                        ]
                    ],
                    'faqs' => [
                        [
                            'question' => 'Why is professional brand identity crucial for my business?',
                            'answer' => 'A professional brand identity is vital because it establishes immediate recognition, builds trust with your audience, and clearly communicates your company\'s values and unique promise. It sets you apart from competitors, fosters loyalty, and creates a consistent impression across all customer touchpoints, driving long-term success.'
                        ],
                        [
                            'question' => 'What is included in your Brand Identity & Branding service?',
                            'answer' => 'Our service typically includes comprehensive brand strategy, logo design, development of a full visual identity system (color palettes, typography, imagery style), brand guidelines, and assistance in crafting your brand\'s core messaging and narrative. The exact deliverables are tailored to your specific needs.'
                        ],
                        [
                            'question' => 'How long does a typical branding project take?',
                            'answer' => 'The timeline for a branding project can vary based on complexity and scope. Generally, a complete brand identity project, from discovery to final guidelines, can take anywhere from 2 to 3 weeks. We\'ll provide a detailed project schedule during our initial consultation.'
                        ],
                        [
                            'question' => 'Can you help us with rebranding an existing business?',
                            'answer' => 'Yes, absolutely. We specialize in both creating new brand identities and strategically rebranding existing businesses. Our rebranding process involves an in-depth analysis of your current brand, market position, and future goals to ensure the new identity effectively revitalizes your presence and resonates with your evolving audience.'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Illustration & Graphic Design',
                'slug' => 'illustration-graphic-design',
                'description' => 'Bringing simplicity and artistry to ideas with visually striking illustrations and graphics that tell your story.',
                'image' => 'images/service-image-3.jpg',
                'link' => '/services/illustration-graphic-design',
                'delay' => '0.4s',
                'sort_order' => 3,
                'description_data' => [
                    'section_1' => 'At Vienhance Studio, we believe visual communication transcends words. We breathe life into your brand\'s story through customized illustrations, bespoke icons, and strong visuals that elevate your message. Our designs don\'t just complement your brand; they provide it with a distinct face, an authentic voice, and an emotional appeal that deeply resonates with your audience.',
                    'section_2' => 'A strong visual identity, reinforced by impactful graphic design and illustration, simplifies communication and ensures continuous interaction with your audience, creating lasting impressions.',
                    'section_3' => 'Good design is a combination of creativity, strategy, and functionality. Our systematic process ensures all visual elements perfectly fit your brand identity, engaging your audience and making your communication more impactful.',
                    'benefits' => [
                        'Greater Visual Storytelling',
                        'Memorable Brand Presence',
                        'Enhanced User Engagement',
                        'Versatility Across Platforms',
                        'Boosts Brand Personality',
                        'Increases Marketing Impact'
                    ],
                    'process' => [
                        [
                            'title' => 'Concept & Ideation',
                            'description' => 'We begin by dissecting your brand\'s personality and objectives, developing innovative directions and sketching preliminary ideas to build a solid visual foundation.',
                            'icon' => 'images/icon-design-process-1.svg'
                        ],
                        [
                            'title' => 'Design & Refinement',
                            'description' => 'We craft high-end illustrations, graphics, and iconography using digital tools and fine art techniques, tailored precisely to your brand\'s narrative and visual identity.',
                            'icon' => 'images/icon-design-process-2.svg'
                        ],
                        [
                            'title' => 'Implementation & Consistency',
                            'description' => 'We optimize and adjust designs across various platforms to ensure seamless consistency for print, digital, and social media, providing a smooth brand experience.',
                            'icon' => 'images/icon-design-process-3.svg'
                        ]
                    ],
                    'faqs' => [
                        [
                            'question' => 'What is the role of graphic design in branding?',
                            'answer' => 'Graphic design is fundamental to branding as it visually communicates your brand\'s message, personality, and values. It creates the visual assets—like logos, color palettes, and imagery—that build recognition, establish trust, and form the foundation of your brand\'s unique identity.'
                        ],
                        [
                            'question' => 'What types of illustrations do you create?',
                            'answer' => 'We create a wide range of custom illustrations, including editorial illustrations, spot illustrations, character designs, infographics, conceptual art, and technical illustrations. Our style is adaptable to best suit your brand\'s aesthetic and message.'
                        ],
                        [
                            'question' => 'How do custom graphics benefit my marketing efforts?',
                            'answer' => 'Custom graphics make your marketing materials more unique, memorable, and impactful. They help your content stand out in a crowded market, convey complex information clearly, evoke emotions, and ultimately increase engagement and recall with your target audience across all channels.'
                        ],
                        [
                            'question' => 'Can you ensure design consistency across different platforms (print, web, social)?',
                            'answer' => 'Absolutely. A core part of our process is ensuring consistency. We develop comprehensive brand guidelines and meticulously adapt designs for various platforms, ensuring your visuals maintain integrity and recognition whether they appear in print, on your website, or across social media channels.'
                        ],
                        [
                            'question' => 'What\'s the typical timeline for a graphic design project?',
                            'answer' => 'Project timelines vary based on complexity and deliverables. A simple icon set might take a few weeks, while a comprehensive illustration project or a full suite of marketing graphics could take longer. We\'ll provide a clear timeline once we understand your specific project scope and needs.'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Print & Marketing Collateral',
                'slug' => 'print-marketing-collateral',
                'description' => 'Creating high-impact print materials that make a lasting, strong impression.',
                'image' => 'images/service-image-4.jpg',
                'link' => '/services/print-marketing-collateral',
                'delay' => '0.6s',
                'sort_order' => 4,
                'description_data' => [
                    'section_1' => 'At Vienhance Studio, we believe excellent design isn\'t just about looks—it\'s about getting your message across and making a lasting impression. From attention-grabbing brochures and dramatic packaging to compelling flyers and publications, we produce print and marketing materials that don\'t just get noticed but also meet your brand\'s communication objectives. Every design is carefully crafted to engage your audience and deliver meaningful interaction, ensuring your brand shines and connects with your audience.',
                    'section_2' => 'Effective marketing and print design increases brand visibility, builds trust, and makes a strong, lasting impression in a competitive marketplace.',
                    'section_3' => 'Each marketing material must be visually engaging, strategically crafted, and in line with your brand. Our process guarantees that every print and digital product provides maximum impact and consistent brand messaging.',
                    'benefits' => [
                        'Boosts Brand Awareness',
                        'Grabs Audience Attention',
                        'Improves Communication',
                        'Aids Marketing Objectives',
                        'Flexible Across Platforms',
                        'Makes Lasting Impressions'
                    ],
                    'process' => [
                        [
                            'title' => 'Understanding Goals & Audience',
                            'description' => 'We start by deeply understanding your brand, target audience, and specific marketing goals to lay a strong foundation for your materials.',
                            'icon' => 'images/icon-design-process-1.svg'
                        ],
                        [
                            'title' => 'Design & Layout',
                            'description' => 'Applying strategic design principles, we create compelling layouts that maximize readability, captivate your audience, and communicate your brand\'s message effectively.',
                            'icon' => 'images/icon-design-process-2.svg'
                        ],
                        [
                            'title' => 'Finalization & Production',
                            'description' => 'We meticulously finalize designs for print media and digital displays, ensuring high-quality outputs, smooth brand continuity, and clear communication across all platforms.',
                            'icon' => 'images/icon-design-process-3.svg'
                        ]
                    ],
                    'faqs' => [
                        [
                            'question' => 'Why are professional marketing and print materials important for my business?',
                            'answer' => 'Professional marketing and print materials are crucial for establishing credibility, building brand recognition, and making a tangible connection with your audience. They enhance your message\'s impact, distinguish you from competitors, and serve as powerful tools for sales and communication.'
                        ],
                        [
                            'question' => 'What types of print materials do you design?',
                            'answer' => 'We design a wide range of print materials including brochures, flyers, business cards, packaging, posters, publications, direct mailers, event collateral, and more. Our expertise covers both small-scale runs and large-scale campaigns.'
                        ],
                        [
                            'question' => 'How do you ensure consistency between print and digital marketing?',
                            'answer' => 'We ensure consistency by developing strong brand guidelines that govern all visual elements—colors, fonts, logos, imagery style—across both print and digital mediums. Our designers meticulously adapt artwork for different platforms, maintaining a cohesive and recognizable brand experience.'
                        ],
                        [
                            'question' => 'Can you help with print production or do you only provide the design files?',
                            'answer' => 'We primarily provide print-ready design files, ensuring they meet all specifications for high-quality production. However, we can also offer guidance on selecting reputable printers and, for certain projects, can manage the print production process to ensure optimal results and a seamless experience for you.'
                        ],
                        [
                            'question' => 'How do these materials contribute to my overall marketing strategy?',
                            'answer' => 'Our marketing and print designs are strategically crafted to align with your broader marketing objectives. They amplify your campaigns by providing visually compelling content, supporting lead generation, enhancing event presence, and reinforcing your brand\'s message across various touchpoints, driving engagement and conversions.'
                        ]
                    ]
                ]
            ],
            [
                'title' => '3D & Motion Graphics',
                'slug' => '3d-motion-graphics',
                'description' => 'Transforming static concepts into dynamic, immersive visual experiences with motion and 3D design.',
                'image' => 'images/service-image-5.jpg',
                'link' => '/services/3d-motion-graphics',
                'delay' => '0.8s',
                'sort_order' => 5,
                'description_data' => [
                    'section_1' => 'At Vienhance Studio, we transform static concepts into dynamic, immersive visual experiences through cutting-edge 3D and motion graphics. We specialize in creating captivating animations, lifelike product visualizations, and compelling motion-based storytelling that not only grab attention but also communicate complex ideas with clarity and impact. Our expertise helps your brand stand out in a crowded digital landscape, offering memorable and engaging interactions across all platforms.',
                    'section_2' => 'Leveraging 3D and motion graphics provides unparalleled opportunities to captivate your audience, enhance brand recall, and deliver your message with dynamic visual flair.',
                    'section_3' => 'Our process for 3D and motion graphics combines creative vision with technical precision, ensuring every animation and visual effect is meticulously crafted to meet your objectives and captivate your audience.',
                    'benefits' => [
                        'Enhanced Storytelling & Engagement',
                        'Increased Brand Memorability',
                        'Superior Product Visualization',
                        'Explains Complex Ideas Easily',
                        'Stands Out in Digital Media',
                        'Boosts Social Media Impact'
                    ],
                    'process' => [
                        [
                            'title' => 'Concept & Storyboarding',
                            'description' => 'Defining objectives, developing creative concepts, scripting, and visualizing the narrative through detailed storyboards and animatics.',
                            'icon' => 'images/icon-design-process-1.svg'
                        ],
                        [
                            'title' => '3D Modeling & Animation',
                            'description' => 'Creating detailed 3D models, applying textures and lighting, then animating elements to bring scenes and characters to life with fluid motion.',
                            'icon' => 'images/icon-design-process-2.svg'
                        ],
                        [
                            'title' => 'Rendering & Post-Production',
                            'description' => 'Rendering high-quality visuals, adding sound design, voiceovers, and final polish to deliver a captivating and impactful motion graphic.',
                            'icon' => 'images/icon-design-process-3.svg'
                        ]
                    ],
                    'faqs' => [
                        [
                            'question' => 'What types of projects are best suited for 3D & Motion Graphics?',
                            'answer' => '3D & motion graphics are ideal for explainer videos, product demonstrations, architectural visualizations, immersive brand intros, dynamic social media content, animated logos, and even complex data visualizations. They excel at bringing abstract or detailed concepts to life.'
                        ],
                        [
                            'question' => 'How long does it take to create a typical motion graphics video?',
                            'answer' => 'The timeline for 3D and motion graphics projects varies widely based on complexity, duration, and required level of detail. A short animated logo might take a few weeks, while a comprehensive explainer video could range from 6–12 weeks or more. We\'ll provide a custom timeline with your proposal.'
                        ],
                        [
                            'question' => 'Do I need to provide a script or specific assets?',
                            'answer' => 'While not strictly necessary, providing a script, brand guidelines, existing 3D models, or even a rough concept can significantly expedite the process. We can also assist with scriptwriting, voiceover talent sourcing, and asset creation as part of our comprehensive service.'
                        ],
                        [
                            'question' => 'Can 3D & Motion Graphics be integrated with existing branding?',
                            'answer' => 'Absolutely. Our goal is to ensure all 3D and motion graphics seamlessly integrate with and enhance your existing brand identity. We meticulously match colors, typography, and visual styles to maintain consistency and reinforce your brand\'s unique presence.'
                        ]
                    ]
                ]
            ]
        ];

        foreach ($servicesData as $serviceData) {
            $descriptionData = $serviceData['description_data'];
            unset($serviceData['description_data']);

            $service = Service::create($serviceData);
            
            ServiceDescription::create([
                'service_id' => $service->id,
                'section_1' => $descriptionData['section_1'],
                'section_2' => $descriptionData['section_2'],
                'section_3' => $descriptionData['section_3'],
                'benefits' => $descriptionData['benefits'],
                'process' => $descriptionData['process'],
                'faqs' => $descriptionData['faqs']
            ]);
        }
    }
}
