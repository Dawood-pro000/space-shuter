# Space Shutter - Database Plan

Using Supabase PostgreSQL. All queries should go through a `services/DatabaseService.php` layer. No direct DB queries in UI files.

## Tables

### 1. `users`
- `id` (UUID, PK)
- `email` (String, Unique)
- `password_hash` (String)
- `role` (Enum: 'user', 'admin')
- `subscription_tier` (Enum: 'free', 'student', 'pro', 'enterprise')
- `total_study_hours` (Int)
- `current_streak` (Int)
- `longest_streak` (Int)
- `created_at` (Timestamp)

### 2. `posts`
- `id` (UUID, PK)
- `title` (String)
- `slug` (String, Unique)
- `content` (Text)
- `abstract` (Text)
- `image_url` (String)
- `status` (Enum: 'upcoming', 'pending', 'published', 'archived')
- `publish_date` (Timestamp)
- `created_at` (Timestamp)

### 3. `categories` & `post_category`
- `categories`: `id`, `name`, `slug`
- `post_category`: `post_id`, `category_id` (M2M)

### 4. `study_plans`
- `id` (UUID, PK)
- `user_id` (UUID, FK)
- `goals` (Text)
- `duration_weeks` (Int)
- `hours_per_week` (Int)
- `generated_path` (JSONB)
- `completion_percentage` (Int)

### 5. `achievements` & `user_achievements`
- `achievements`: `id`, `name`, `description`, `icon_url`
- `user_achievements`: `user_id`, `achievement_id`, `earned_at`

### 6. `bookmarks`
- `id` (UUID, PK)
- `user_id` (UUID, FK)
- `content_type` (Enum: 'post', 'book', 'article')
- `content_id` (UUID)
- `created_at` (Timestamp)

### 7. `books`
- `id` (UUID, PK)
- `title` (String)
- `author` (String)
- `file_url` (String)
- `cover_url` (String)
- `uploaded_at` (Timestamp)

### 8. `activity_logs`
- `id` (UUID, PK)
- `admin_id` (UUID, FK)
- `action_type` (String)
- `target_object` (String)
- `previous_value` (JSONB, nullable)
- `new_value` (JSONB, nullable)
- `created_at` (Timestamp)

### 9. `subscriptions`
- `id` (UUID, PK)
- `user_id` (UUID, FK)
- `plan` (String)
- `status` (String)
- `expiry_date` (Timestamp)
- `payment_history` (JSONB)

### 10. `feature_flags`
- `key` (String, PK)
- `is_enabled` (Boolean)
