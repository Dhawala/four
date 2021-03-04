import EmployeeCreate from "./components/EmployeeCreate";
import EmployeeEdit from "./components/EmployeeEdit";
import EmployeeList from "./components/EmployeeList";

export default [
    {path:'/employee/',component:EmployeeList},
    {path:'/employee/create',component:EmployeeCreate},
    {path:'/employee/:id',component:EmployeeEdit},
]
