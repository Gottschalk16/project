import React, { createContext, useEffect, useMemo, useReducer } from 'react';
import { iUsuario, ObjUsuario } from "../interfaces/iUsuario";
import { addUsuario, deleteUsuario, getUsuario, setUsuario } from '../utils/setAction';
import dataUsuario from '../mock/UsuarioMock';

const initState: any = {
  usuarios: [] as ObjUsuario[]
};

const UsuarioContext = createContext<iUsuario>({} as iUsuario);

export const UsuarioProvider: React.FC = ({ children }) => {
  const [state, dispatch] = useReducer((
    value: typeof initState,
    action: {
      payload: ObjUsuario[],
      type: string
    }
  ) => {
    switch (action.type) {
      case getUsuario.type: {
        return value;
      }
      case setUsuario.type: {
        const NovoUsuario = {
          ...value,
          usuarios: action.payload
        };
        return NovoUsuario;
      }
      case addUsuario.type: {
        const UsuariosNovoId = [
          {
            nome: (action.payload as unknown as ObjUsuario).nome,
            senha: (action.payload as unknown as ObjUsuario).senha
          }
        ];
        value.usuario.forEach((usuarios: ObjUsuario) => {
          const UsuarioNovoId = {
            nome: usuarios.nome,
            senha: usuarios.senha
          };
          UsuariosNovoId.push(UsuarioNovoId);
        });
        const NovoValor = {
          ...value,
          usuarios: UsuariosNovoId
        }
        console.log(NovoValor);
        return NovoValor;
      }
      case deleteUsuario.type: {
        const usuarioId = (action.payload as unknown as ObjUsuario).id;
        const deleteUsuario = value.usuarios.filter((usuarios: any) => usuarios.id !== usuarioId);
        const NovoState = {
          usuarios: [...deleteUsuario]
        };
        return NovoState;
      }
      default: throw new Error();
    }
  }, initState);

  useEffect(() => {
    if (dataUsuario.usuarios.length !== 0) {
      dispatch(setUsuario(dataUsuario.usuarios));
    }
  }, []);

  const contextValues = useMemo(() => ({ state, dispatch }), [dispatch, state]);
  return (
    <UsuarioContext.Provider value={contextValues}>
      { children }
    </UsuarioContext.Provider>
  )
};

export default UsuarioContext;