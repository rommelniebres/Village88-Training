require 'rails_helper'
RSpec.describe SecretsController, type: :controller do
    before do
        @user = create(:user)
        @secret = create(:secret, user: @user)
    end
    context "when not logged in" do
        before do
            session[:user_id] = nil
        end
        it "cannot access index" do 
            get :index, params: {id: @user}
        end
        it "cannot access create" do 
            post :create, params: {id: @user, Content: @secret.content}
        end
        it "cannot access destroy" do
            delete :delete, params: {id: @secret}
        end
        after do
            expect(response).to redirect_to("/sessions/new")
        end
    end
    context "when signed in as the wrong user" do
        before do
            @user2 = create(:user, email: 'oscar2@gmail.com')
            session[:user_id] = @user2.id
        end
        it "cannot destroy another user's secret" do
            delete :delete, params: {id: @secret}
        end
        after do
            expect(response).to redirect_to("/users/#{session[:user_id]}")
        end
    end

    
end