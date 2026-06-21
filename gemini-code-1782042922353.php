<h1>Technical Architecture & System Structure</h1>

<h2>1. System Topography</h2>
<p>The system utilizes a lightweight, containerized PHP runtime deployed on Railway, leveraging Supabase as a modern, high-performance PostgreSQL backbone, and an external Cloud Object Storage system for heavy media assets.</p>

<pre>
       +--------------------------------------------+
       |          PHP Application Runtime           |
       |             (Hosted on Railway)             |
       +---------------------+----------------------+
                             |
         +-------------------+-------------------+
         |                                       |
         v                                       v
+--------+-----------------+           +---------+-----------------+
|   Supabase Database     |           |   Cloud Storage Bucket    |
|   (PostgreSQL Core)     |           |  (Cloudinary / AWS S3)    |
+-------------------------+           +---------------------------+
| - User Profiles & Auth  |           | - High-Res Mars Images    |
| - AI Study Plans        |           | - Infographics & Diagrams |
| - Structured Articles   |           | - User Avatars            |
| - Real-time Progress    |           +---------------------------+
+-------------------------+
</pre>

<h2>2. Complete Directory Tree Structure</h2>
<p>Below is the modular, production-ready project structure tailored for clean deployment on Railway without XAMPP constraints:</p>

<pre>
project-vision/
├── .gemini/
│   └── instructions.json           # Structural instructions for AI agents
├── .railway/
│   └── config.json                 # Deployment constraints for Railway
├── config/
│   ├── database.php                # Supabase PostgreSQL PDO link
│   └── services.php                # Gemini API client & configuration
├── core/
│   ├── AI/
│   │   └── Planner.php             # Prompt handling & roadmap compilation
│   ├── Auth/
│   │   └── OAuthHandler.php        # Google OAuth flow callbacks
│   └── Tracker/
│       └── RealtimeProgress.php    # State updates & session tracking
├── cron/
│   └── IngestArticles.php          # Script executing every 5 hours
├── public/
│   ├── assets/
│   │   ├── css/
│   │   │   └── gsd-theme.css       # Modified "Get Shit Done" styling framework
│   │   └── js/
│   │       └── main.js             # Real-time progress listeners
│   ├── index.php                   # Core application routing router
│   ├── login.php                   # Authentication gate
│   └── dashboard.php               # User learning workspace
├── vendor/                         # Composer dependencies
├── composer.json                   # PHP runtime dependencies
├── memory.md                       # Core AI persistent project memory state
└── README.md                       # Environment assembly instructions
</pre>