<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    //display a listing of the resource, return a JSON
    public function index()//GET
    {
        /**
         * Retrieve all players from the database.
         *
         * @return \Illuminate\Database\Eloquent\Collection|Player[]
         */
        $players = Player::all();
        return response()->json($players);
    }

    //store a newly created resource in storage
    public function storage(Request $request)//POST
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
        ]);

        $player = Player::create($validatedData);
        return response()->json($player, 201);
    }

    //show a specific player/resource
    public function show(Player $player)//GET   
    {
        return response()->json($player, 200);
    }

    //update a specific resource in storage
    public function update(Request $request, Player $player)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
        ]);

        $player->update($validatedData);
        return response()->json($player, 200);
    }

    //delete a specific resource in storage
    public function destroy(Player $player){
        
        $player->delete();
        return response()->json(null, 204);
    }
}
