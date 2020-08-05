<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->expiry = $request->due;
        $task->user()->associate(User::find($request->assign));
        $task->project()->associate(Project::find($request->project));
        $task->save();

        return response()->json(["succeess" => "success"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->ajax()){
            Task::destroy($request->id);
            return response()->json(["success" => "Uspešno izbrisana"]);
        }
    }
}

INSERT INTO `bills` (`id`, `izdaja`, `st_racuna`, `acmd_id`, `storno`, `qr`, `eor`, `zoi`, `stranka`, `znesek`, `taksa`, `ddv22`, `ddv95`, `neobdavceno`, `stanje`, `created_at`, `updated_at`) VALUES
(10007, '2020-05-20 18:14:12', 'REC-B1-10007', 7, null, '233411778212872952960246288749138052814965901142005201814122', '82161131-7c12-41db-9f37-1d49bf506782', 'af99792a676fb04192c68c389e8c86ce', 'Test', 0.00, 0.00, 0.00, 0.00, 0.00, 'potrjen', '2020-06-01 11:47:31', '2020-06-01 11:47:31'),
(10008, '2020-05-20 18:14:12', 'REC-B1-10008', 8, null, '049695372185457153149894871106543853741965901142005201814123', '6ea21a89-7d66-47e7-8bb5-45ebb2eb5663', '2562fb0499a9243e2fe83d2d4522a0ad', 'df', 0.00, 0.00, 0.00, 0.00, 0.00, 'potrjen', '2020-06-01 12:33:12', '2020-06-01 12:33:12'),
(10016, '2020-05-20 18:14:12', 'REC-B1-10016', 16, null, '157725129043635733601533947666787421924965901142005201814124', '28d12820-6a91-4b24-9747-1eb0be19f1d8', '76a8c1412ce7f134a24b90baec674ee4', 'Test 3 ', 24.00, 4.00, 0.00, 20.00, 4.00, 'potrjen', '2020-06-01 14:10:51', '2020-06-01 14:10:51'),
(10021, '2020-06-02 11:15:52', 'REC-B1-10021', 21, null, '213614976970989484380417220140898660255965901142006021115528', '5ab0560b-71ad-4474-af20-e47e1eaaaf30', 'a0b4bf81a233fb62361058755f572f9f', 'Test', 0.00, 0.00, 0.00, 0.00, 0.00, 'potrjen', '2020-06-02 08:15:52', '2020-06-02 08:15:52'),
(10017, '2020-06-02 11:26:20', 'REC-B1-10017', 17, null, '061244388869327353548398936258988380664965901142006021126201', 'f0fc5b51-1f8f-4c6f-bc65-76ab8a063e3b', '2e133d80b0ce07c2841c5a7d70b691f8', 'ROBIC', 33.20, 4.00, 9.20, 20.00, 4.00, 'potrjen', '2020-06-02 08:26:21', '2020-06-02 08:26:21'),
(10015, '2020-06-03 16:36:24', 'REC-B1-10015', 15, null, '177923517961747190042958449504401085092965901142006031636247', '30f11024-5554-4b98-be59-025527011d6d', '85e568827ce81891f6645a1227fa8172', 'DOLLINGER', 58.80, 8.00, 10.80, 40.00, 8.00, 'potrjen', '2020-06-03 13:36:25', '2020-06-03 13:36:25'),
(10009, '2020-06-03 16:39:03', 'REC-B1-10009', 9, null, '087530547329516849025500351323985558682965901142006031639039', '079541d0-240f-4ef7-ac47-ea9bf09ea0c4', '41d9c52cd04b87252e60818ce6723c9a', 'KROISS', 61.60, 8.00, 13.60, 40.00, 8.00, 'potrjen', '2020-06-03 13:39:04', '2020-06-03 13:39:04'),
(10014, '2020-06-03 16:43:18', 'REC-B1-10014', 14, null, '129005160254660941477605431130391150328965901142006031643183', '226014b8-c234-4c56-afd6-2cfcacdb99a9', '610d7d77f25fefef5a6d4b3542617ef8', 'KROISS', 52.80, 8.00, 4.80, 40.00, 8.00, 'potrjen', '2020-06-03 13:43:18', '2020-06-03 13:43:18');
(10004, '2020-06-05 10:30:07', 'REC-B1-10004', 4, null, '096375609555364659013725445539435278041965901142006051030074', 'ce3b7064-acd2-4a94-9df7-68376bf8f8c3', '488144698569f73e33784a2f9be26ed9', 'SCHOETERS', 105.60, 16.00, 9.60, 80.00, 16.00, 'potrjen', '2020-06-03 13:43:18', '2020-06-05 07:30:08'),
(10002, '2020-06-04 19:43:07', 'REC-B1-10002', 2, null, '128660064932159517059768483191238358286965901142006041943072', '152fc4f4-03c5-49f1-9b23-8cd0922ee85d', '60cb06f49c60063c8bce1d11d9caf50e', 'SCHAEFER', 93.40, 12.00, 21.40, 60.00, 12.00, 'potrjen', '2020-06-04 16:25:36', '2020-06-04 16:43:08'),
(10027, '2020-06-04 19:44:08', 'REC-B1-10027', 27, null, '331925541038446170366495097545804586108.0000000000965901142006041944082', '9d11a902-7b07-4df3-9788-76e0eb3618fa', 'f9b688ac502107678bd4febb98119c7c', 'RODER', 27.80, 4.00, 3.80, 20.00, 4.00, 'potrjen', '2020-06-04 16:44:09', '2020-06-04 16:44:09'),
(10023, '2020-06-04 19:45:06', 'REC-B1-10023', 23, null, '327200539345119760834505867022389284623.0000000000965901142006041945064', 'e828fc27-67d7-40ef-a8e6-bcca628a090c', 'f628881a8169324bedca9a13eae10f0f', 'MACKEBEN', 81.40, 10.00, 18.40, 53.00, 10.00, 'potrjen', '2020-06-04 16:45:06', '2020-06-04 16:45:06'),
(10024, '2020-06-05 14:18:14', 'REC-B1-10024', 24, null, '098829902189268713226821162052527427248965901142006051418147', 'a218acc7-0406-4f0d-85d6-e820765bf81b', '4a59f261a9b31ae4e0fdd1d761d58eb0', 'GUMBRECHT', 47.40, 6.00, 11.40, 30.00, 6.00, 'potrjen', '2020-06-05 11:18:15', '2020-06-05 11:18:15');


DateTime::
