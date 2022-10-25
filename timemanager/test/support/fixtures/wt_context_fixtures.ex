defmodule Timemanager.WTContextFixtures do
  @moduledoc """
  This module defines test helpers for creating
  entities via the `Timemanager.WTContext` context.
  """

  @doc """
  Generate a wt.
  """
  def wt_fixture(attrs \\ %{}) do
    {:ok, wt} =
      attrs
      |> Enum.into(%{
        end: ~N[2022-10-23 15:15:00],
        start: ~N[2022-10-23 15:15:00]
      })
      |> Timemanager.WTContext.create_wt()

    wt
  end
end
