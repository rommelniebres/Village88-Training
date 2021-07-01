require 'rails_helper'
feature "user creates a post" do
    scenario "successfully creates a new post" do
        visit posts_path
        fill_in "message", with: "Hello I am a Message"
        create(:post, user: build(:user))
        click_button "Post a Message"
        expect(page).to have_current_path(posts_path)
        expect(page).to have_content "Hello I am a Message"
    end
    scenario "unsuccessfully creates a new post" do
        visit posts_path
        fill_in "message", with: "Hello"
        create(:post, user: build(:user))
        click_button "Post a Message"
        expect(page).to have_current_path(posts_path)
        expect(page).to have_content "Message is too short (minimum is 10 characters)"
    end
end
feature "user tries to logout" do
    scenario "successfully logout" do
        visit posts_path
        click_button "Logout"
        expect(page).to have_current_path(new_user_path)
    end
end