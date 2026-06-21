<h1>Product Requirements Document (PRD): Project Vision</h1>

<h2>1. Product Overview</h2>
<p><strong>Project Vision</strong> is an immersive, interactive educational platform dedicated to space, general science, technology, active space missions, and breaking cosmic discoveries. The platform goes beyond passive reading by allowing users to dynamically build tailored study plans—either manually or generated through an integrated AI engine based on user-specified timelines, skill levels, and learning goals.</p>

<h2>2. Core Features & Capabilities</h2>
<ul>
    <li><strong>Dynamic Content Hub:</strong> Aggregated, categorized articles and media covering planetary info, quantum physics, aerospace engineering, active rover/satellite missions, and cutting-edge tech.</li>
    <li><strong>AI Study Planner:</strong> A guided wizard where users input their learning parameters (e.g., "I want to learn about Black Holes in 3 weeks, spending 2 hours a week"). The Gemini API processes this and returns a structured, multi-day learning roadmap utilizing platform articles.</li>
    <li><strong>Interactive Learning Tracker:</strong> Real-time progress bars, completion checkboxes for milestones, time-spent tracking, and personalized dashboards.</li>
    <li><strong>Solar & Planetary Exploration Matrix:</strong> A dedicated, highly visual search directory containing architectural data, telemetry, and fast facts on planets, moons, and deep-space objects.</li>
    <li><strong>Automated Ingestion:</strong> A background script running every 5 hours via a Railway Cron job that fetches, sanitizes, and indexes new scientific breakthroughs using the Gemini API to summarize raw material into structured articles.</li>
</ul>