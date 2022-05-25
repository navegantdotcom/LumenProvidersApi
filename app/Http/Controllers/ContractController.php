<?php

namespace App\Http\Controllers;

use App\Services\ContractService;
use App\Services\ProviderService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContractController extends Controller
{
    use ApiResponser;
    
    /**
     * The service to consume the contract service
     * @var ContractService
     */
    public $contractService;

    /**
     * The service to consume the provider service
     * @var ProviderService
     */
    public $providerService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ContractService $contractService, ProviderService $providerService)
    {
        $this->contractService = $contractService;
        $this->providerService = $providerService;
    }

    /**
     * Retrieve and show all the contracts
     * @return Illuminate\Http\Response
     */

    public function index()
    {
        return $this->successResponse($this->contractService->obtainContracts()); 
    }

    /**
     * Creates an instance of contract
     * @return Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->providerService->obtainProvider($request->provider_id);
        return $this->successResponse($this->contractService->createContract($request->all(), Response::HTTP_CREATED));
    }
    /**
     * Obtain and show an instance of contract
     * @return Illuminate\Http\Response
     */

    public function show($contract)
    {
        return $this->successResponse($this->contractService->obtainContract($contract));
    }
    /**
     * Updated an instance of contract
     * @return Illuminate\Http\Response
     */

    public function update(Request $request, $contract)
    {
        return $this->successResponse($this->contractService->editContract($request->all(), $contract)); 
    }
    /**
     * Deleted an instance of contract
     * @return Illuminate\Http\Response
     */

    public function destroy($contract)
    {
        return $this->successResponse($this->contractService->deleteContract($contract));
    }
}
