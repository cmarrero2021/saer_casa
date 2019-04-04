﻿CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.procedencias FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.autorizacion FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.coordinaciones FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.inicio FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.oficinas FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.rat FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.unidades FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.pisos FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.pueblos FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.status_carnets FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.tipovisitantes FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.tipo_visitante FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.motivos FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.entidades FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.usuarios FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.carnets FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.visitantes FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.grupos FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.permisos FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.empresas FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.visitas FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.trabajadores FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();
CREATE TRIGGER audit_trigger_row AFTER INSERT OR UPDATE OR DELETE ON public.destinos FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();