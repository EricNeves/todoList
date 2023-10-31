import { FaRegEdit, FaTrashRestore } from 'react-icons/fa'

export default function Table({ listTodos: todos,  handleCheck, load, remove }) {
  return (
    <div className="relative overflow-x-auto w-full md:w-3/4 mt-4 mb-2 shadow-md sm:rounded-lg">
      <table className="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
          <th scope="col" className="px-6 py-3">
              Check
            </th>
            <th scope="col" className="px-6 py-3">
              #ID
            </th>
            <th scope="col" className="px-6 py-3">
              Title
            </th>
            <th scope="col" className="px-6 py-3">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          {todos
          .sort((a, b) => a.order - b.order)
          .map(todo => (
            <tr key={todo.id} className="bg-white border-b dark:bg-gray-800 dark:border-gray-800">
              <td scope="row" className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <input onChange={handleCheck} checked={todo.completed || false}  type="checkbox" value={JSON.stringify(todo)} className="form-checkbox h-4 w-4 text-blue-600" />
              </td>

              <td scope="row" className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <p>{todo.id}</p>
              </td>

              <td className="px-6 py-4">
                <p className={todo.completed ? 'line-through' : ''} >{todo.task}</p>
              </td>

              <td className="px-6 py-4">
                <div className='flex gap-2 items-center'>
                  <button onClick={() => load(todo)} className='bg-orange-600 p-2 rounded-lg'>
                    <FaRegEdit className='text-white' />
                  </button>
                  
                  <button onClick={() => remove(todo)} className='bg-red-600 p-2 rounded-lg'>
                    <FaTrashRestore className='text-white' />
                  </button>
                </div>
              </td>
            </tr>

          ))}
        </tbody>
      </table>
    </div>
  )
}