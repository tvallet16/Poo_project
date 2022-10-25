defmodule Timemanager.Repo.Migrations.CreateWorkingtimes do
  use Ecto.Migration

  def change do
    create table(:workingtimes) do
      add :start, :naive_datetime, null: false
      add :end, :naive_datetime, null: false
      add :user, references(:users, on_delete: :nothing), null: false

      timestamps()
    end

    alter table(:workingtimes) do
      add :user_id, references(:users), null: false
    end

    create index(:workingtimes, [:user])
  end
end
