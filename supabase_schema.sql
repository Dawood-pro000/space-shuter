-- Supabase SQL Schema for Project Vision

-- 1. Create Articles Storage Table
CREATE TABLE IF NOT EXISTS public.articles (
    id UUID DEFAULT gen_random_uuid() PRIMARY KEY,
    title TEXT NOT NULL,
    slug TEXT UNIQUE NOT NULL,
    category VARCHAR(100) NOT NULL, -- space, science, technology, discoveries
    raw_abstract TEXT,
    beautified_content TEXT NOT NULL, -- The Gemini-enhanced HTML copy
    image_url TEXT,
    source_author TEXT,
    published_at TIMESTAMP WITH TIME ZONE DEFAULT TIMEZONE('utc'::text, NOW()) NOT NULL,
    created_at TIMESTAMP WITH TIME ZONE DEFAULT TIMEZONE('utc'::text, NOW()) NOT NULL
);

-- 2. Create User Profiles (linked to Supabase Auth metadata)
CREATE TABLE IF NOT EXISTS public.user_profiles (
    id UUID REFERENCES auth.users NOT NULL PRIMARY KEY,
    display_name TEXT,
    avatar_url TEXT,
    created_at TIMESTAMP WITH TIME ZONE DEFAULT TIMEZONE('utc'::text, NOW()) NOT NULL
);

-- 3. Create Learning Tracking Matrix
CREATE TABLE IF NOT EXISTS public.learning_tracks (
    id UUID DEFAULT gen_random_uuid() PRIMARY KEY,
    user_id UUID REFERENCES auth.users NOT NULL,
    article_id UUID REFERENCES public.articles(id) ON DELETE CASCADE,
    is_completed BOOLEAN DEFAULT FALSE NOT NULL,
    time_spent_seconds INT DEFAULT 0 NOT NULL,
    last_accessed TIMESTAMP WITH TIME ZONE DEFAULT TIMEZONE('utc'::text, NOW()) NOT NULL,
    CONSTRAINT unique_user_article UNIQUE (user_id, article_id)
);

-- Enable basic performance indexing
CREATE INDEX IF NOT EXISTS idx_articles_category ON public.articles(category);
CREATE INDEX IF NOT EXISTS idx_tracking_user ON public.learning_tracks(user_id);
