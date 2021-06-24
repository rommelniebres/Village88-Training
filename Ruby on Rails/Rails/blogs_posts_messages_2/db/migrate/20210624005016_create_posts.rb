class CreatePosts < ActiveRecord::Migration[6.1]
  def change
    create_table :posts do |t|
      t.references :blog, null: false, foreign_key: true
      t.references :user, null: false, foreign_key: true
      t.string :title
      t.string :content

      t.timestamps
    end
  end
end
