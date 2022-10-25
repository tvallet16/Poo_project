defmodule Timemanager.WTContextTest do
  use Timemanager.DataCase

  alias Timemanager.WTContext

  describe "workingtimes" do
    alias Timemanager.WTContext.WT

    import Timemanager.WTContextFixtures

    @invalid_attrs %{end: nil, start: nil}

    test "list_workingtimes/0 returns all workingtimes" do
      wt = wt_fixture()
      assert WTContext.list_workingtimes() == [wt]
    end

    test "get_wt!/1 returns the wt with given id" do
      wt = wt_fixture()
      assert WTContext.get_wt!(wt.id) == wt
    end

    test "create_wt/1 with valid data creates a wt" do
      valid_attrs = %{end: ~N[2022-10-23 15:15:00], start: ~N[2022-10-23 15:15:00]}

      assert {:ok, %WT{} = wt} = WTContext.create_wt(valid_attrs)
      assert wt.end == ~N[2022-10-23 15:15:00]
      assert wt.start == ~N[2022-10-23 15:15:00]
    end

    test "create_wt/1 with invalid data returns error changeset" do
      assert {:error, %Ecto.Changeset{}} = WTContext.create_wt(@invalid_attrs)
    end

    test "update_wt/2 with valid data updates the wt" do
      wt = wt_fixture()
      update_attrs = %{end: ~N[2022-10-24 15:15:00], start: ~N[2022-10-24 15:15:00]}

      assert {:ok, %WT{} = wt} = WTContext.update_wt(wt, update_attrs)
      assert wt.end == ~N[2022-10-24 15:15:00]
      assert wt.start == ~N[2022-10-24 15:15:00]
    end

    test "update_wt/2 with invalid data returns error changeset" do
      wt = wt_fixture()
      assert {:error, %Ecto.Changeset{}} = WTContext.update_wt(wt, @invalid_attrs)
      assert wt == WTContext.get_wt!(wt.id)
    end

    test "delete_wt/1 deletes the wt" do
      wt = wt_fixture()
      assert {:ok, %WT{}} = WTContext.delete_wt(wt)
      assert_raise Ecto.NoResultsError, fn -> WTContext.get_wt!(wt.id) end
    end

    test "change_wt/1 returns a wt changeset" do
      wt = wt_fixture()
      assert %Ecto.Changeset{} = WTContext.change_wt(wt)
    end
  end
end
