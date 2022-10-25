defmodule Timemanager.UserContext.User do
  use Ecto.Schema
  import Ecto.Changeset
  alias Timemanager.WTContext.WT
  alias Timemanager.ClockContext.Clock

  schema "users" do
    field :email, :string
    field :username, :string

    has_many :workingtimes, WT
    has_many :clocks, Clock
    timestamps()
  end

  @doc false
  def changeset(user, attrs) do
    user
    |> cast(attrs, [:username, :email])
    |> validate_required([:username, :email])
    |> validate_format(:email, ~r/.+@.+..+/, [message: "Please input a valid email"])
  end
end
