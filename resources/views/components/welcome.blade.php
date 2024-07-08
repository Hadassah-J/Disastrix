<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disastrix: Your Emergency Service Companion</title>
    <style>
        /* Embedded CSS styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-image: url('images/Healthimage.jpg'); /* Background image */
            background-size: cover;
            background-position: center;
            min-height: 100vh; /* Ensure full screen coverage */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #333; /* Default text color */
            background-color: #fff; /* Fallback background color */
        }

        .invisible-box {
            background-color: transparent; /* Remove background color */
        }

        .card-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px; /* Adjust gap between cards */
            max-width: 800px; /* Set maximum width for the grid */
            margin-top: 20px; /* Add margin for separation */
        }

        .card {
            background-color: #ffffff; /* White background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add subtle shadow */
        }

        .card h2 {
            color: #191970; /* Heading color */
            font-size: 24px;
            font-weight: bold;
        }

        .card p {
            color: #82BFFF; /* Paragraph color */
            font-size: 18px;
            line-height: 1.6; /* Adjust line height */
        }
    </style>
</head>
<body>
    <div class="invisible-box">
        <div class="card">
            <h1 class="text-2xl font-semibold" style="color: #191970; font-size: 24px;">
                Welcome to Disastrix: Your Emergency Service Companion in Kenya
            </h1>
            <p class="mt-4 text-base/relaxed" style="color:#82BFFF; font-size: 18px;">
                Disastrix is your gateway to seamless access to emergency services across Kenya. Whether you require police, fire, medical assistance, or other emergency services, Disastrix ensures prompt and efficient help tailored to your specific needs.
            </p>
        </div>

        <div class="card-container">
            <div class="card">
                <!-- First Card -->
                <h2>Documentation</h2>
                <p>
                    Disastrix offers a robust platform to handle various emergency situations efficiently. Users can swiftly report emergencies, providing vital details to dispatchers and responders. This streamlined communication enhances the effectiveness of emergency services, empowering individuals to act decisively during critical moments.
                </p>
            </div>

            <div class="card">
                <!-- Second Card -->
                <h2>Laracasts</h2>
                <p>
                    Disastrix serves as more than just an emergency link—it's a comprehensive resource center. Offering safety tips, emergency preparedness guidelines, and real-time updates during crises, Disastrix is your reliable ally in safeguarding communities across Kenya. Partnering with local authorities and service providers, we're committed to improving emergency response and making safety a priority with every interaction.
                </p>
            </div>

            <div class="card">
                <!-- Third Card -->
                <h2>Our Commitment to Innovation and Impact</h2>
                <p>
                    Disastrix embodies a commitment to leveraging technology for the greater good, ensuring that emergency services are accessible and efficient. Our continuous improvement initiatives focus on enhancing user experience and expanding service capabilities. With a dedicated team of professionals and partners, Disastrix remains at the forefront of emergency management innovation, striving to make a positive impact on the lives of individuals and communities in Kenya. Join us in embracing safety and preparedness with Disastrix, where every action contributes to a safer and more responsive emergency ecosystem.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
