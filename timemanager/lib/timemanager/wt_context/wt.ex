defmodule Timemanager.WTContext.WT do
  use Ecto.Schema
  import Ecto.Changeset
  alias Timemanager.UserContext.User

  schema "workingtimes" do
    field :end, :naive_datetime
    field :start, :naive_datetime
    # field :user, :id

    belongs_to :user, User
    timestamps()
  end

  @doc false
  def changeset(wt, attrs) do
    wt
    |> cast(attrs, [:start, :end, :user_id])
    |> validate_required([:start, :end, :user_id])
    |> assoc_constraint(:user)
  end
end
