require 'rails_helper'
RSpec.describe UsersController, type: :controller do
    before do
        @user = create(:user)
    end
    context "when not logged in" do
        before do
            session[:user_id] = nil
        end
        it "cannot access show" do 
            get :show, params: {id: @user}
        end
        it "cannot access edit" do
            get :edit, params: {id: @user}
        end
        it "cannot access update" do 
            patch :update, params: {id: @user}
        end
        it "cannot access destroy" do 
            delete :destroy, params: {id: @user}
        end
        after do
            expect(response).to redirect_to("/sessions/new")
        end
    end
    #Advanced: Authorization Testing
    context "when signed in as the wrong user" do
        before do
            @user2 = create(:user, email: 'oscar2@gmail.com')
            session[:user_id] = @user2.id
        end
        it "cannot access profile page another user" do
            get :show, params: {id: @user}
        end
        it "cannot access the edit page of another user" do
            get :edit, params: {id: @user}
        end 
        it "cannot update another user" do
            patch :update, params: {id: @user}
        end 
        it "cannot destroy another user" do
            delete :destroy, params: {id: @user}
        end 
        after do
            expect(response).to redirect_to("/users/#{session[:user_id]}")
        end
    end
end