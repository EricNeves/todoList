import { FaTasks, FaPlus } from 'react-icons/fa'

function Form({ save, handleInputChange, errorSubmit, fields }) {

  const styleInput = `border ${errorSubmit ? 'outline-red-500 border-none focus:outline-red-500' : 'border-gray-600 focus:outline-blue-600'} text-gray-900 text-sm rounded-lg block w-full p-2.5 bg-gray-700 outline-none focus:border-none dark:placeholder-gray-400 dark:text-white`

  return (
    <section className="w-3/4 mt-4 mb-2">
      <form onSubmit={e => e.preventDefault()}>
        <div>
          <label className="mb-2 flex items-center gap-2 text-md font-medium text-gray-900 dark:text-white">
            <FaTasks /> Task
          </label>
          <input type="text" value={fields?.task} name="task" onChange={handleInputChange} className={styleInput} autoComplete="off" placeholder="Task"></input>
        </div>

        <div className='mt-4 mb-2'>
          <button onClick={save} type="submit" className="focus:outline-none text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-white font-medium rounded-lg flex items-center gap-1 text-sm px-5 py-2.5 mb-2">Save <FaPlus /></button>
        </div>
      </form>
    </section>
  )
}

export default Form