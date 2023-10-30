import { useState, useEffect } from 'react'

import Form from "../Form";
import Table from "../Table";
import { api } from '../../api'

export default function Main() {
  const [inputValue, setInputValue] = useState({ task: '' })
  const [errorSubmit, setErrorSubmit] = useState(false)
  const [listTodos, setListTodos] = useState([])


  useEffect(() => {
    api.get('/todos').then(res => setListTodos(res.data.data))
  }, [])

  function updatedList(todo, add = true) {
    const list = listTodos.filter(t => t.id !== todo.id)
    if (add) list.unshift(todo)
    return list
  }

  function save() {
    setErrorSubmit(false)

    const method = inputValue.id ? "put" : "post"
    const url = inputValue.id ? `/todos/${inputValue.id}/update` : '/todos/create'

    api[method](url, inputValue)
      .then(res => {
        const list = updatedList(res.data)
        setListTodos(list)
      }).catch(err => {
        if (err.response.data.message) setErrorSubmit(true)
      })

    setInputValue({ task: '' })
  }

  function handleInputChange(event) {
    const { value: task } = event.target

    setErrorSubmit(false);

    setInputValue(old => (
      {
        ...old,
        [event.target.name]: task
      }
    ))
  }

  function remove(todo) {

  }

  function load(todo) {
    setInputValue(todo)
  }

  return (
    <main className="bg-slate-900 h-screen p-4 flex flex-col items-center">
      <Form
        handleInputChange={handleInputChange}
        save={save}
        errorSubmit={errorSubmit}
        fields={inputValue}
      />

      <Table todos={listTodos} load={load} remove={remove} />
    </main>
  );
}