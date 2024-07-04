import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { Table } from "flowbite-react";

export default function Employee({ auth, employees }) {
    console.log(employees);

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Employees
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            {employees && ( // Conditionally render to avoid errors
                                <ul></ul>
                            )}
                            {!employees && <p>Loading employees...</p>}{" "}
                            <div className="overflow-x-auto">
                                <div class="pb-4 bg-white dark:bg-gray-900">
                                    <label for="table-search" class="sr-only">
                                        Search
                                    </label>
                                    <div class="relative mt-1">
                                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg
                                                class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 20 20"
                                            >
                                                <path
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                                                />
                                            </svg>
                                        </div>
                                        <input
                                            type="text"
                                            id="table-search"
                                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Search for items"
                                        />
                                    </div>
                                </div>
                                <Table hoverable>
                                    <Table.Head>
                                        <Table.HeadCell>
                                            School ID
                                        </Table.HeadCell>
                                        <Table.HeadCell>Name</Table.HeadCell>
                                        <Table.HeadCell>
                                            Department
                                        </Table.HeadCell>
                                        <Table.HeadCell>
                                            Classification
                                        </Table.HeadCell>
                                        <Table.HeadCell>
                                            Appointment
                                        </Table.HeadCell>
                                        <Table.HeadCell>
                                            Designation
                                        </Table.HeadCell>
                                        <Table.HeadCell>
                                            Modify
                                            <span className="sr-only">
                                                Modify
                                            </span>
                                        </Table.HeadCell>
                                    </Table.Head>

                                    <Table.Body className="divide-y">
                                        {employees.map((employee) => (
                                            <Table.Row
                                                className="bg-white dark:border-gray-700 dark:bg-gray-800"
                                                key={employee.id}
                                            >
                                                <Table.Cell>
                                                    {employee.univ_id}
                                                </Table.Cell>
                                                <Table.Cell>
                                                    <a href="#" target="">
                                                        {employee.emp_name}
                                                    </a>
                                                </Table.Cell>
                                                <Table.Cell>
                                                    {employee.dept_name}
                                                </Table.Cell>
                                                <Table.Cell>
                                                    {employee.emp_class}
                                                </Table.Cell>
                                                <Table.Cell>
                                                    {employee.appointment_desc}
                                                </Table.Cell>
                                                <Table.Cell>
                                                    {employee.designation_desc}
                                                </Table.Cell>
                                                <Table.Cell>
                                                    <a
                                                        href="#"
                                                        className="font-medium text-cyan-600 hover:underline dark:text-cyan-500"
                                                    >
                                                        Edit
                                                    </a>
                                                </Table.Cell>
                                            </Table.Row>
                                        ))}
                                    </Table.Body>
                                </Table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
