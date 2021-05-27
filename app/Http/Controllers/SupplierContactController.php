<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSupplierContactRequest;
use App\Http\Requests\UpdateSupplierContactRequest;
use App\Repositories\SupplierContactRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SupplierContactController extends AppBaseController
{
    /** @var  SupplierContactRepository */
    private $supplierContactRepository;

    public function __construct(SupplierContactRepository $supplierContactRepo)
    {
        $this->supplierContactRepository = $supplierContactRepo;
    }

    /**
     * Display a listing of the SupplierContact.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $supplierContacts = $this->supplierContactRepository->all();

        return view('supplier_contacts.index')
            ->with('supplierContacts', $supplierContacts);
    }

    /**
     * Show the form for creating a new SupplierContact.
     *
     * @return Response
     */
    public function create()
    {
        return view('supplier_contacts.create');
    }

    /**
     * Store a newly created SupplierContact in storage.
     *
     * @param CreateSupplierContactRequest $request
     *
     * @return Response
     */
    public function store(CreateSupplierContactRequest $request)
    {
        $input = $request->all();

        $supplierContact = $this->supplierContactRepository->create($input);

        Flash::success('Supplier Contact saved successfully.');

        return redirect(route('supplierContacts.index'));
    }

    /**
     * Display the specified SupplierContact.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $supplierContact = $this->supplierContactRepository->find($id);

        if (empty($supplierContact)) {
            Flash::error('Supplier Contact not found');

            return redirect(route('supplierContacts.index'));
        }

        return view('supplier_contacts.show')->with('supplierContact', $supplierContact);
    }

    /**
     * Show the form for editing the specified SupplierContact.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $supplierContact = $this->supplierContactRepository->find($id);

        if (empty($supplierContact)) {
            Flash::error('Supplier Contact not found');

            return redirect(route('supplierContacts.index'));
        }

        return view('supplier_contacts.edit')->with('supplierContact', $supplierContact);
    }

    /**
     * Update the specified SupplierContact in storage.
     *
     * @param int $id
     * @param UpdateSupplierContactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSupplierContactRequest $request)
    {
        $supplierContact = $this->supplierContactRepository->find($id);

        if (empty($supplierContact)) {
            Flash::error('Supplier Contact not found');

            return redirect(route('supplierContacts.index'));
        }

        $supplierContact = $this->supplierContactRepository->update($request->all(), $id);

        Flash::success('Supplier Contact updated successfully.');

        return redirect(route('supplierContacts.index'));
    }

    /**
     * Remove the specified SupplierContact from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $supplierContact = $this->supplierContactRepository->find($id);

        if (empty($supplierContact)) {
            Flash::error('Supplier Contact not found');

            return redirect(route('supplierContacts.index'));
        }

        $this->supplierContactRepository->delete($id);

        Flash::success('Supplier Contact deleted successfully.');

        return redirect(route('supplierContacts.index'));
    }
}
