defmodule Timemanager.ClockContext.Clock do
  use Ecto.Schema
  import Ecto.Changeset
  alias Timemanager.UserContext.User

  schema "clocks" do
    field :status, :boolean, default: false
    field :time, :naive_datetime
    # field :user, :id

    belongs_to :user, User
    timestamps()
  end

  @doc false
  def changeset(clock, attrs) do
    clock
    |> cast(attrs, [:time, :status, :user_id])
    |> validate_required([:time, :status, :user_id])
    |> assoc_constraint(:user)
  end
end