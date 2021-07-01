require 'rails_helper'
feature "guest user creates an account" do
    scenario "successfully creates a new user account" do
        visit new_user_path
        fill_in "username", with: "John2"
        click_button "Create User"
        expect(page).to have_content "Welcome, John2"
        expect(page).to have_current_path(posts_path)
    end
    scenario "unsuccessfully create, username is too short" do
        visit new_user_path
        fill_in "username", with: "John"
        click_button "Create User"
        expect(page).to have_content "Username is too short (minimum is 5 characters)"
    end
end