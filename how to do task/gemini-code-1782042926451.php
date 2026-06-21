<h1>Security, Access, & Frontend Specifications</h1>

<h2>1. Security, Roles & RBAC Matrix</h2>
<p>Access control is structured via Role-Based Access Control (RBAC) mapped through Supabase JWT payloads during the Google OAuth login cycle.</p>

<table border="1" cellpadding="8" style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr style="background-color: #1a1a2e; color: #ffffff; text-align: left;">
            <th>User Role</th>
            <th>Platform Permissions</th>
            <th>Data Access Boundaries</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Anonymous Visitor</strong></td>
            <td>Read public science articles, browse planetary search matrices.</td>
            <td>No tracking capability, blocked from AI Planner API calls.</td>
        </tr>
        <tr>
            <td><strong>Authenticated Learner</strong></td>
            <td>Generate AI study tracks, manage progress markers, modify profile data.</td>
            <td>Can read/write only their own row-level security (RLS) records in tracking tables.</td>
        </tr>
        <tr>
            <td><strong>System Cron Agent</strong></td>
            <td>Inject daily science discoveries, update background content indexes.</td>
            <td>Bypasses normal API write caps via private service keys to write directly to articles.</td>
        </tr>
    </tbody>
</table>

<h2>2. Frontend Specifications & Theme Configuration</h2>
<ul>
    <li><strong>Design Foundation:</strong> Built on the <em>GSD (Get Shit Done) UI Kit</em>, adapted to mirror a clean, modern deep-space aesthetic.</li>
    <li><strong>Color Palette:</strong>
        <ul>
            <li>Primary Background: Deep Cosmos Blue (<code>#0B0C10</code>)</li>
            <li>Secondary Containers: Nebula Dark Slate (<code>#1F2833</code>)</li>
            <li>Accents & Calls to Action: Laser Cyan (<code>#66FCF1</code>) or Star Amber (<code>#FFB400</code>)</li>
        </tr>
    </ul>
    <li><strong>Typography Hierarchy:</strong>
        <ul>
            <li>Headings (h1, h2, h3): <strong>Orbitron</strong> or <strong>Space Grotesk</strong> (Clean, geometric sci-fi aesthetics)</li>
            <li>Body Copy: <strong>Inter</strong> or <strong>Roboto</strong> at 1.15 line-spacing to maximize readability during long study sessions.</li>
        </tr>
    </ul>
</ul>