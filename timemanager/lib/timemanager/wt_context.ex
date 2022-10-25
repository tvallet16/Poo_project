defmodule Timemanager.WTContext do
  @moduledoc """
  The WTContext context.
  """

  import Ecto.Query, warn: false
  alias Timemanager.Repo

  alias Timemanager.WTContext.WT

  @doc """
  Returns the list of workingtimes.

  ## Examples

      iex> list_workingtimes()
      [%WT{}, ...]

  """
  def list_workingtimes do
    Repo.all(WT)
  end

  @doc """
  Gets a single wt.

  Raises `Ecto.NoResultsError` if the Wt does not exist.

  ## Examples

      iex> get_wt!(123)
      %WT{}

      iex> get_wt!(456)
      ** (Ecto.NoResultsError)

  """
  def get_wt!(id), do: Repo.get!(WT, id)

  def getOneByUser!(userId, id), do: Repo.get_by!(WT, [id: id, user_id: userId])

  def getAllByUserAndDate!(userId, date_start, date_end) do
    query = from(wt in WT, where: wt.user_id == ^userId and wt.end <= ^date_end and wt.start >= ^date_start)
    Repo.all(query) |> Repo.preload(:user)
  end

  def getAllByUser!(userId) do
    query = from(wt in WT, where: wt.user_id == ^userId)
    Repo.all(query) |> Repo.preload(:user)
  end

  @doc """
  Creates a wt.

  ## Examples

      iex> create_wt(%{field: value})
      {:ok, %WT{}}

      iex> create_wt(%{field: bad_value})
      {:error, %Ecto.Changeset{}}

  """
  def create_wt(attrs \\ %{}, user_id) do
    {int_user_id, ""} = Integer.parse(user_id)
    %WT{user_id: int_user_id}
    |> WT.changeset(attrs)
    |> Repo.insert()
  end

  @doc """
  Updates a wt.

  ## Examples

      iex> update_wt(wt, %{field: new_value})
      {:ok, %WT{}}

      iex> update_wt(wt, %{field: bad_value})
      {:error, %Ecto.Changeset{}}

  """
  def update_wt(%WT{} = wt, attrs) do
    wt
    |> WT.changeset(attrs)
    |> Repo.update()
  end

  @doc """
  Deletes a wt.

  ## Examples

      iex> delete_wt(wt)
      {:ok, %WT{}}

      iex> delete_wt(wt)
      {:error, %Ecto.Changeset{}}

  """
  def delete_wt(%WT{} = wt) do
    Repo.delete(wt)
  end

  @doc """
  Returns an `%Ecto.Changeset{}` for tracking wt changes.

  ## Examples

      iex> change_wt(wt)
      %Ecto.Changeset{data: %WT{}}

  """
  def change_wt(%WT{} = wt, attrs \\ %{}) do
    WT.changeset(wt, attrs)
  end
end
