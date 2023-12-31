<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use DB;
use Exception;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.emp_db');
    }

    public function create()
    {
        return view('admin.emp_register');
    }

    public function save_emp_info(Request $request)
    {
        $name = $request->input('name');
        $address = $request->input('address');
        $dob = $request->input('dob');
        $joined_date = $request->input('joined_date');
        $phone_number = $request->input('phone_number');

        $data = array('e_name'=>$name,
					'e_address'=>$address,
					'e_dob'=>$dob,
                    'e_joined_date'=>$joined_date,
                    'e_phone_number'=>$phone_number,
		);

        DB::table('rbs_db.tbl_employee')
            ->insert($data);

        return 'correct';
    }

    public function get_all_emp_data(){
        
        $data = DB::table('rbs_db.tbl_employee')
                    ->select('tbl_employee.id','tbl_employee.e_name','tbl_employee.e_address','tbl_employee.e_dob','tbl_employee.e_joined_date','tbl_employee.e_phone_number')
                    ->get();

        return compact('data');
    }

    public function get_emp_data(Request $request){

        $id = $request->input('emp_rec_id');
       
        $data = DB::table('rbs_db.tbl_employee')
                    ->select('tbl_employee.id','tbl_employee.e_name', 'tbl_employee.e_address', 'tbl_employee.e_dob', 'tbl_employee.e_joined_date', 'tbl_employee.e_phone_number')
                    ->where('tbl_employee.id', '=', $id)
                    ->get();

        return compact('data');
    }

    public function update_emp_data(Request $request)
    {
        $emp_id = $request->input('emp_id');
        $emp_name = $request->input('emp_name');
        $emp_address = $request->input('emp_address');
        $emp_dob = $request->input('emp_dob');
        $emp_joined_date = $request->input('emp_joined_date');
        $emp_phone_number = $request->input('emp_phone_number');

        $data = DB::table('rbs_db.tbl_employee')
                    ->where('tbl_employee.id', $emp_id)
                    ->update(['e_name' => $emp_name,
                            'e_address' => $emp_address,
                            'e_dob' => $emp_dob,
                            'e_joined_date' => $emp_joined_date,
                            'e_phone_number' => $emp_phone_number,
                        ]);  
        
        return 'success';
        
    }
    
    public function edit(Employee $employee)
    {
        //
    }


    public function update(Request $request, Employee $employee)
    {
        //
    }

    public function delete_emp(Request $request)
    {
        $emp_id = $request->input('emp_rec_id');

        $data = DB::table('rbs_db.tbl_employee')
                    ->where('id',$emp_id)
                    ->delete();
        
        return 'success';
    }

    public function print_emp_all_data(Request $request)
    {
        try {
            $data = DB::table('rbs_db.tbl_employee')
                    ->select('tbl_employee.id','tbl_employee.e_name','tbl_employee.e_address','tbl_employee.e_dob','tbl_employee.e_joined_date','tbl_employee.e_phone_number')
                    ->get();

            return $data;

        }
        catch (Exception $exception) {
            return $exception;
        }
    }
}
