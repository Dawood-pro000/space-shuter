<?php
// config/env_loader.php

function loadEnv($path) {
    if (!file_exists($path)) {
        return;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        if (strpos($line, '=') === false) {
            continue;
        }

        list($name, $value) = explode('=', $line, 2);
        $name  = trim($name);
        $value = trim($value);

        // Remove surrounding quotes if present
        if (preg_match('/^"(.*)"$/s', $value, $matches) || preg_match("/^'(.*)'$/s", $value, $matches)) {
            $value = $matches[1];
        }

        // Always set non-empty values from .env — this ensures local .env
        // overrides any stale/empty system environment variables.
        if (!empty($value)) {
            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name]    = $value;
            $_SERVER[$name] = $value;
        } elseif (!getenv($name)) {
            // Only set empty values if not already defined
            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name]    = $value;
            $_SERVER[$name] = $value;
        }
    }
}

// Load .env from project root
loadEnv(__DIR__ . '/../.env');
