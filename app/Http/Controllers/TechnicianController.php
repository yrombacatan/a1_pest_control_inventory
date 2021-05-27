<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTechnicianRequest;
use App\Http\Requests\UpdateTechnicianRequest;
use App\Repositories\TechnicianRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TechnicianController extends AppBaseController
{
    /** @var  TechnicianRepository */
    private $technicianRepository;

    public function __construct(TechnicianRepository $technicianRepo)
    {
        $this->technicianRepository = $technicianRepo;
    }

    /**
     * Display a listing of the Technician.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $technicians = $this->technicianRepository->all();

        return view('technicians.index')
            ->with('technicians', $technicians);
    }

    /**
     * Show the form for creating a new Technician.
     *
     * @return Response
     */
    public function create()
    {
        return view('technicians.create');
    }

    /**
     * Store a newly created Technician in storage.
     *
     * @param CreateTechnicianRequest $request
     *
     * @return Response
     */
    public function store(CreateTechnicianRequest $request)
    {
        $input = $request->all();

        $technician = $this->technicianRepository->create($input);

        Flash::success('Technician saved successfully.');

        return redirect(route('technicians.index'));
    }

    /**
     * Display the specified Technician.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $technician = $this->technicianRepository->find($id);

        if (empty($technician)) {
            Flash::error('Technician not found');

            return redirect(route('technicians.index'));
        }

        return view('technicians.show')->with('technician', $technician);
    }

    /**
     * Show the form for editing the specified Technician.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $technician = $this->technicianRepository->find($id);

        if (empty($technician)) {
            Flash::error('Technician not found');

            return redirect(route('technicians.index'));
        }

        return view('technicians.edit')->with('technician', $technician);
    }

    /**
     * Update the specified Technician in storage.
     *
     * @param int $id
     * @param UpdateTechnicianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTechnicianRequest $request)
    {
        $technician = $this->technicianRepository->find($id);

        if (empty($technician)) {
            Flash::error('Technician not found');

            return redirect(route('technicians.index'));
        }

        $technician = $this->technicianRepository->update($request->all(), $id);

        Flash::success('Technician updated successfully.');

        return redirect(route('technicians.index'));
    }

    /**
     * Remove the specified Technician from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $technician = $this->technicianRepository->find($id);

        if (empty($technician)) {
            Flash::error('Technician not found');

            return redirect(route('technicians.index'));
        }

        $this->technicianRepository->delete($id);

        Flash::success('Technician deleted successfully.');

        return redirect(route('technicians.index'));
    }
}
