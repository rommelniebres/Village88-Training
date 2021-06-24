# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# This file is the source Rails uses to define your schema when running `bin/rails
# db:schema:load`. When creating a new database, `bin/rails db:schema:load` tends to
# be faster and is potentially less error prone than running all of your
# migrations from scratch. Old migrations may fail to apply correctly if those
# migrations use external dependencies or application code.
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema.define(version: 2021_06_24_055522) do

  create_table "blogs", force: :cascade do |t|
    t.string "name"
    t.string "description"
    t.datetime "created_at", precision: 6, null: false
    t.datetime "updated_at", precision: 6, null: false
  end

  create_table "comments", force: :cascade do |t|
    t.string "commentable_type", null: false
    t.integer "commentable_id", null: false
    t.string "content"
    t.datetime "created_at", precision: 6, null: false
    t.datetime "updated_at", precision: 6, null: false
    t.index ["commentable_type", "commentable_id"], name: "index_comments_on_commentable"
  end

  create_table "messages", force: :cascade do |t|
    t.integer "post_id", null: false
    t.integer "user_id", null: false
    t.string "author"
    t.string "message"
    t.datetime "created_at", precision: 6, null: false
    t.datetime "updated_at", precision: 6, null: false
    t.index ["post_id"], name: "index_messages_on_post_id"
    t.index ["user_id"], name: "index_messages_on_user_id"
  end

  create_table "owners", force: :cascade do |t|
    t.integer "user_id", null: false
    t.integer "blog_id", null: false
    t.datetime "created_at", precision: 6, null: false
    t.datetime "updated_at", precision: 6, null: false
    t.index ["blog_id"], name: "index_owners_on_blog_id"
    t.index ["user_id"], name: "index_owners_on_user_id"
  end

  create_table "posts", force: :cascade do |t|
    t.integer "blog_id", null: false
    t.integer "user_id", null: false
    t.string "title"
    t.string "content"
    t.datetime "created_at", precision: 6, null: false
    t.datetime "updated_at", precision: 6, null: false
    t.index ["blog_id"], name: "index_posts_on_blog_id"
    t.index ["user_id"], name: "index_posts_on_user_id"
  end

  create_table "users", force: :cascade do |t|
    t.string "first_name"
    t.string "last_name"
    t.string "email_address"
    t.datetime "created_at", precision: 6, null: false
    t.datetime "updated_at", precision: 6, null: false
  end

  add_foreign_key "messages", "posts"
  add_foreign_key "messages", "users"
  add_foreign_key "owners", "blogs"
  add_foreign_key "owners", "users"
  add_foreign_key "posts", "blogs"
  add_foreign_key "posts", "users"
end
