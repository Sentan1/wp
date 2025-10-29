# Database Setup for A3 (SkillSwap)

Place your SQL files here:
- skillswap.sql — Base schema and seed data
- skillswap_update.sql — Alterations/updates (e.g., extra columns, indexes)

Localhost (XAMPP) import
1) Create database (you can match `includes/db_connect.inc` name, e.g., `s4169598`).
2) Import `skillswap.sql` via phpMyAdmin (Import tab) or CLI:
   - CLI: `mysql -u root -p s4169598 < skillswap.sql`
3) Apply updates: `skillswap_update.sql` the same way.

Jacob 5 import
1) Database name MUST be exactly your student ID (e.g., `s4169598`).
2) Import `skillswap.sql` into that DB.
3) Apply `skillswap_update.sql`.

Required tables/columns
- users(user_id PK, username UNIQUE, email UNIQUE, password_hash, created_at)
- skills(skill_id PK, user_id FK->users.user_id, title, description, category, level, rate DECIMAL(10,2), image_path, created_at)

Suggested indexes
- FULLTEXT(title, description) for fast search (optional if using LIKE)
  Example:
  ```sql
  ALTER TABLE skills ADD FULLTEXT ft_title_description (title, description);
  ```

Notes
- Ensure `created_at` defaults or is set by app; pages order by `created_at`.
- File uploads are written to `a3/assets/images/skills/` (folder needs write perms on server).
